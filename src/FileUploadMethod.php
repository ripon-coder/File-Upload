<?php

namespace RiponCoder\FileUpload;

use Illuminate\Support\Facades\File;

class FileUploadMethod
{
    private $path;

    public function path($data)
    {
        $this->path = $data;
        return $this;
    }
    public function uploadFile($file)
    {
        $directories = explode('/', $this->path);
        $currentPath = public_path();
        if (!empty($file)) {
            foreach ($directories as $directory) {
                $currentPath = $currentPath . '/' . $directory;
                if (!File::exists($currentPath)) {
                    File::makeDirectory($currentPath);
                }
            }
            $filename = time() . '_' . strtolower(str_replace(' ', '_', $file->getClientOriginalName()));
            $file->move(public_path($this->path), $filename);
            return $filename;
        }
    }
    public function uploadWithDb($instance, $file)
    {

        $directories = explode('/', $this->path);
        $currentPath = public_path();
        if (!empty($file)) {
            foreach ($directories as $directory) {
                $currentPath = $currentPath . '/' . $directory;
                if (!File::exists($currentPath)) {
                    File::makeDirectory($currentPath);
                }
            }

            $filename = time() . '_' . strtolower(str_replace(' ', '_', $file->getClientOriginalName()));
            $status = $file->move(public_path($this->path), $filename);
            if ($status) {
                $filePath = public_path($this->path) . '/' . $filename;
                $fileSize = filesize($filePath);
                $fileExtension = $file->getClientOriginalExtension();
                $fileinfo = [
                    'file_name' =>  $filename,
                    'url' => $this->path . '/' . $filename,
                    'file_orginal_name' => $file->getClientOriginalName(),
                    'file_size' => $fileSize,
                    'file_extenstion' => $fileExtension
                ];
                $instance->imageabble()->updateOrCreate(
                    [
                        'imageabble_id' => $instance->id,
                        'imageabble_type' => get_class($instance),
                    ],
                    $fileinfo
                );
            }
        }
    }
    public function updateWithDb($instance, $file)
    {


        if (!empty($fileName = $instance->imageabble->file_name)) {
            if (File::exists(public_path($this->path . '/' . $fileName))) {
                File::delete(public_path($this->path . '/' . $fileName));
            }
        }
        $directories = explode('/', $this->path);
        $currentPath = public_path();
        if (!empty($file)) {
            foreach ($directories as $directory) {
                $currentPath = $currentPath . '/' . $directory;
                if (!File::exists($currentPath)) {
                    File::makeDirectory($currentPath);
                }
            }

            $filename = time() . '_' . strtolower(str_replace(' ', '_', $file->getClientOriginalName()));
            $status = $file->move(public_path($this->path), $filename);
            if ($status) {
                $filePath = public_path($this->path) . '/' . $filename;
                $fileSize = filesize($filePath);
                $fileExtension = $file->getClientOriginalExtension();
                $fileinfo = [
                    'file_name' =>  $filename,
                    'url' => $this->path . '/' . $filename,
                    'file_orginal_name' => $file->getClientOriginalName(),
                    'file_size' => $fileSize,
                    'file_extenstion' => $fileExtension
                ];
                $instance->imageabble()->updateOrCreate(
                    [
                        'imageabble_id' => $instance->id,
                        'imageabble_type' => get_class($instance),
                    ],
                    $fileinfo
                );
            }
        }
    }

    public function deleteWithDb($instance)
    {
        if(!isset($instance->imageabble)) return false;
        if (!empty($fileName = $instance->imageabble->file_name)) {
            if (File::exists(public_path($this->path . '/' . $fileName))) {
                File::delete(public_path($this->path . '/' . $fileName));
            }
        }
        return $instance->imageabble()->delete();
    }

    public function removeFile($file)
    {
        if (!empty($file)) {
            if (File::exists(public_path($this->path . '/' . $file))) {
                File::delete(public_path($this->path . '/' . $file));
            }
        }
        return $this;
    }
    public function deleteFile($file)
    {
        if (!empty($file)) {
            if (File::exists(public_path($this->path . '/' . $file))) {
                File::delete(public_path($this->path . '/' . $file));
            }
            return true;
        }
    }
}
