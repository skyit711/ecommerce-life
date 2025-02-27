<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResponse;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //

    public function upload(Request $request): ApiResponse
    {
        // Validate the incoming request to ensure a file is present
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        // Store the file in the 'uploads' directory on the 'public' disk
        $filePath = $request->file('file')->store('uploads', 'public');

        // Return a response with the file path
        return new ApiResponse([
            'message' => 'File uploaded successfully.',
            'data' => [
                'file_path' => $filePath,
            ],
        ]);
    }
}
