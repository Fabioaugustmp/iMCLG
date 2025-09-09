<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilepondController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $path = $file->store('tmp', 'public');

            return response($path, 200);
        }

        return response('No file uploaded', 400);
    }

    public function revert(Request $request)
    {
        $path = $request->getContent();
        Storage::disk('public')->delete($path);

        return response('', 200);
    }
}
