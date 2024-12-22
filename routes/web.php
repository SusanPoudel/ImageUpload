<?php

use Illuminate\Support\Facades\Route;
use ImageUpload\ImageUpload;

Route::post('/image-upload', function (Illuminate\Http\Request $request) {
    $imageUpload = new ImageUpload();
    try {
        $uploadedFiles = $imageUpload->handleUpload($request);
        return response()->json(['success' => true, 'files' => $uploadedFiles]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
})->name('imageupload.upload');
