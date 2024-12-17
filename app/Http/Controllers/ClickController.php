<?php

namespace App\Http\Controllers;

use App\Models\ButtonClick;
use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function storeClick(Request $request)
    {
        // Validasi input
        $request->validate([
            'button_id' => 'required|string',
            'button_name' => 'required|string',
        ]);

        // Ambil data button_id dan button_name dari request
        $buttonId = $request->input('button_id');
        $buttonName = $request->input('button_name');

        // Simpan atau update data klik di database
        $buttonClick = ButtonClick::firstOrCreate(
            ['button_id' => $buttonId],
            ['button_name' => $buttonName]
        );

        // Tambah jumlah klik
        $buttonClick->click_count += 1;
        $buttonClick->save();

        // Respon JSON
        return response()->json([
            'message' => "Klik button {$buttonName} berhasil disimpan!",
            'click_count' => $buttonClick->click_count
        ]);
    }
}