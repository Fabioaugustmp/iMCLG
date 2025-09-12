<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Log;

class FilepondController extends Controller
{
    public function upload(Request $request)
    {
        Log::info('Filepond upload request received');
        Log::info($request->all());

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $path = $file->store('tmp', 'public');
            Log::info('File stored at: ' . $path);

            return response($path, 200);
        }

        Log::error('No file uploaded');
        return response('No file uploaded', 400);
    }

    public function revert(Request $request)
    {
        $path = $request->getContent();
        Storage::disk('public')->delete($path);

        return response('', 200);
    }
}
