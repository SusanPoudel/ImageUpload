<?php

namespace ImageUpload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUpload
{
    protected $allowedFileTypes;
    protected $maxFileSize;
    protected $uploadDirectory;

    public function __construct()
    {
        $this->allowedFileTypes = config('imageupload.allowed_file_types');
        $this->maxFileSize = config('imageupload.max_file_size');
        $this->uploadDirectory = config('imageupload.upload_directory');
    }

    public function handleUpload(Request $request)
    {
        $files = $request->file('images');

        $uploadedFiles = [];

        foreach ($files as $file) {
            $fileType = $file->getMimeType();
            $fileSize = $file->getSize() / 1024; // Convert bytes to KB

            if (!in_array($fileType, $this->allowedFileTypes)) {
                throw new \Exception("Invalid file type: $fileType");
            }

            if ($fileSize > $this->maxFileSize) {
                throw new \Exception("File size exceeds the limit: $fileSize KB");
            }

            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs($this->uploadDirectory, $fileName);

            $uploadedFiles[] = $filePath;
        }

        return $uploadedFiles;
    }
}
