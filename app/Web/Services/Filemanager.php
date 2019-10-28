<?php 
namespace App\Web\Services;

use App\Web\Models\File;
use Illuminate\Http\Request;
use Image;

class Filemanager{

    protected $maxWidth = 1000;
    protected $maxHeight = 900;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function upload($key, $fileable=null, $method=null, $field=null, $ext=null)
    {
        $file = $this->request->file($key);

        if( is_null($file) ) return null;

        $mime      = $file->getMimeType();
        $extension = ($ext) ? $ext : $file->getClientOriginalExtension();
        $name      = sprintf('%s.%s', str_random(), $extension);

        if(str_is('image/*', $mime)){
            $image = Image::make($file);
            $width = $image->width();
            $height = $image->height();

            if($width > $this->maxWidth){
                $image->resize($this->maxWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            if($height > $this->maxHeight){
                $image->resize(null, $this->maxHeight, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $attribute = [
                'name'      => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'mime'      => $mime,
                'size'      => $image->filesize(),
                'height'    => $height,
                'width'     => $width,
            ];

            $type = 'image';
            $path = 'storages/' . $type . '/'. $field;

            $dir = public_path(dirname($path.'/'.$name));
            if( ! file_exists($dir) ) mkdir($dir, 0777, true);
            
            $image->save(public_path($path . '/' . $name));

        }else{
            $attribute = [
                'name'      => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'mime'      => $file->getClientMimeType(),
                'size'      => $file->getClientSize()
            ];
            $type = 'file';
            $path = 'storages/' . $type;
            $file->move(public_path($path), $name);
        }

        if( ! is_null($fileable) && ! is_null($method) )
        {
            if($field){
                $mFile = $fileable->{$method}()->field($field)->first();
            }else{
                $mFile = $fileable->{$method};
            }
            $relation = true;
        }else{
            $relation = false;
        }

        if( !isset($mFile) ){
            $mFile = new File;
        }else{
            $this->deleteFile($mFile);
            
        }

        if($mFile){
            $mFile->name      = $name;
            $mFile->type      = $type;
            $mFile->path      = $path;
            $mFile->field     = $field ?: $method ?: '';
            $mFile->attribute = $attribute;
        }

        if($relation)
        {
            $fileable->{$method}()->save($mFile);
        }else{
            $mFile->save();
        }
        $data = $mFile;
        $success = true;

        return compact('success', 'data');
    }

    public function delete($mFile, callable $callback=null)
    {
        if( ! $mFile instanceof File)
        {
            $mFile = File::find($mFile);
        }

        if( ! is_null($mFile) ) {
            $mFile->delete();
            $this->deleteFile($mFile);
        }

        if( is_callable($callback) ){
            return $callback($mFile);
        }else{
            return $mFile;
        }
    }

    public function find($id)
    {
        return File::find($id);
    }

    public function deleteFile(File $mFile)
    {
        $deleteFile = implode('/', [$mFile->path, $mFile->name]);
        if( is_file($deleteFile) ) unlink($deleteFile);
    }
}