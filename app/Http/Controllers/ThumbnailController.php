<?php 
namespace App\Http\Controllers;

use App\Web\Services\Filemanager;
use Illuminate\Http\Request;
//use Intervention\Image\Image;

use Image;

class ThumbnailController extends Controller
{
    public function __construct(Filemanager $service, Request $request)
    {
        $this->service  = $service;
        $this->$request = $request;
        //$this->session  = $request->session();
        //$this->image  = $image;
    }

    public function fit($id, $width, $height)
    {
        $file = $this->service->find($id);
        $source = implode('/', [$file->path, $file->name]);
        $image = Image::make($source)->fit($width, $height);

        return $image->response('jpg');
    }
}