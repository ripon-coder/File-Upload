<?php

namespace RiponCoder\FileUpload\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageabble extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'url',
        'file_orginal_name',
        'file_size',
        'file_extenstion'
    ];
    public function Imageabble(){
        return $this->morphTo();
    }
}
