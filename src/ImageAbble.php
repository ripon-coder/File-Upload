<?php
namespace RiponCoder\FileUpload;
use RiponCoder\FileUpload\Models\Imageabble as Image;

trait ImageAbble{
    public function imageabble(){
        return $this->morphOne(Image::class,'imageabble');
    }
}