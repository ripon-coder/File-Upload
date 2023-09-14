<?php
namespace RiponCoder\FileUpload;
use RiponCoder\FileUpload\FileUploadMethod;

class FileUpload{
    public static function __callStatic($name, $arguments)
    {
        $instance = new FileUploadMethod();
        return $instance->{$name}(...$arguments);
    }
}