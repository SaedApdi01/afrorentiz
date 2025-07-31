<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;

trait FileUpload
{
    public function uploadUserImage(UploadedFile $file, string $directory = 'uploads/user-profiles'): ?string
    {
        return $this->uploadFile($file, $directory, 'profile-' . Auth::user()->name);
    }

    public function uploadPropertyImage(UploadedFile $file, string $directory = 'uploads/properties'): ?string
    {
        return $this->uploadFile($file, $directory, 'property-' . Auth::user()->name);
    }

    protected function uploadFile(UploadedFile $file, string $directory, string $prefix): ?string
    {
        try {
            if (!$file->isValid()) {
                throw new \Exception('Invalid file upload');
            }

            $filename = $prefix . '-' . Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path($directory);

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            return '/' . trim($directory, '/') . '/' . $filename;

        } catch (\Exception $e) {
            \Log::error('File upload failed: ' . $e->getMessage());
            return null;
        }
    }

    public function deleteFile(string $path): bool
    {
        $fullPath = public_path($path);

        if (File::exists($fullPath)) {
            return File::delete($fullPath);
        }

        return false;
    }
}
