<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            // Dapatkan file dari request
            $file = $request->file('upload');
            // Buat nama file unik
            $filename = time() . '_' . Str::random(40);
            // Simpan file di assets/uploads
            $path = $file->move('assets/berita/uploads', $filename);

            // Url dari file yang diupload
            $url = asset('assets/berita/upload' . $filename);

            // Kirim respon ke CKEditor
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'File upload failed.'
            ]
        ]);
    }
}