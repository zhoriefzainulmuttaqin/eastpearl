<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Layanan;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function payment(Request $request)
    {
        $EP_cat = Category::get();
        return view('payment.step1', compact('EP_cat'));
    }

    public function select(Request $request)
    {
        $services = Layanan::get();
        return view('payment.step2', compact('services'));
    }

    public function proccess_pay(Request $request)
    {
        $services = is_array($request->service) ? $request->service : explode(',', $request->service);
        $fitServices = is_array($request->fit_service) ? $request->fit_service : explode(',', $request->fit_service);

        $transaction = Payment::create([
            'code' => 'Payment-' . mt_rand(100000, 999999),
            'name' => $request->name,
            'country' => $request->country,
            'service' => implode(', ', $services),
            'fit_service' => implode(', ', $fitServices),
            'amount' => $request->amount,
        ]);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->code,
                'gross_amount' => $request->amount,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'email' => "none@mail.com",
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        return redirect()->to('payment/select-service/confirm-pay/' . $transaction->id);
    }

    public function confirm_pay($id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('payment.confirm_pay', compact('payment'));
    }

    public function proccess_confirm_pay(Payment $payment)
    {

        $params = [
            'transaction_details' => [
                'order_id' => $payment->code,
                'gross_amount' => $payment->amount,
            ],
            'customer_details' => [
                'first_name' => $payment->name,
                'email' => "none",
            ],
            'credit_card' => [
                'secure' => true,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $payment->snap_token = $snapToken;
        $payment->save();
        return response()->json(['status' => 'success', 'snap_token' => $snapToken]);

    }

    public function updateStatus(Request $request)
    {
        $payment = Payment::where('id', $request->payment_id)->first();

        if ($payment) {
            $payment->status = 'success';
            $payment->save();

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Payment not found'], 404);
        }
    }

    public function payment_success($code)
    {
        $payment = Payment::where('code', $code)->first();
        return view('payment.payment_success', compact('payment'));
    }
}