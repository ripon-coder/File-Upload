<?php
namespace RiponCoder\FileUpload;
use Illuminate\Support\ServiceProvider;
class FileUploadServiceProvide extends ServiceProvider{
    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

    }
    public function register(){

    }
}