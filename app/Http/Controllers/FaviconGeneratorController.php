<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FaviconGeneratorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('upload')) {
            $request->validate([
                'upload' => 'required|file|mimes:webp,jpg,jpeg,png|max:10240',
            ]);

            $upload = $request->file('upload');

            $res = Http::post(config('urls.nodejs').'/generate-favicons', [
                'upload' => base64_encode(file_get_contents($upload->path())),
            ])
                ->body();

            return response($res)
                ->header('Content-Type', 'application/zip')
                ->header('Content-Disposition', 'attachment; filename="favicons.zip"');
        }

        return view('pages.favicon-generator');
    }
}
