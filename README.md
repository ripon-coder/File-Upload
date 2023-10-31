# File Upload Laravel Package

## Installation
```sh
composer require riponcoder/file-upload
```
## Migration
```sh
php artisan migrate
```
## Facades
```sh
use RiponCoder\FileUpload\FileUpload;
```
## Usage
### Model Inside
```sh
use RiponCoder\FileUpload\ImageAbble;
use ImageAbble
```
### File Upload with DB
```sh
    public function Insert(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->save();
        FileUpload::path('ripon/sajib')->uploadWithDb($post,$request->image);

        // Access For
         $post =  Post::find(3);
         return $post->imageabble;
    }
        
```
### File Update with DB
```sh
    public function Update(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->save();
        FileUpload::path('ripon/sajib')->updateWithDb($post,$request->image);

        // Access For
         $post =  Post::find(3);
         return $post->imageabble;
    }
```
### File Deleted with DB
```sh
    public function Delete(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->save();
        FileUpload::path('ripon/sajib')->deleteFile($post);
    }
```
### Only file Upload

```sh
FileUpload::path("dynamic-assets/admin-avatar")->uploadFile($request->image);
```
### Only Update file

```sh
  FileUpload::path("dynamic-assets/admin-avatar")->removeFile($admin->image ?? '')->uploadFile($request->image);
```

### Only deleted file
```sh
  FileUpload::path("dynamic-assets/admin-avatar")->deleteFile($filename);
```
