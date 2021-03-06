<?php

namespace App\Http\Controllers\SiteManager;

use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\FileManagerRepository;

class ImageController extends Controller
{
    public function __construct(FileManagerRepository $fileManager){
        $this->fileManager = $fileManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = DB::table('galleries')->where('type', 'image')->orderByRaw('created_at DESC')->get();
        return $this->sendResponse($image->toArray(),"Videos retrieved successfully.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $nameImage = $this->fileManager->actionImage();

        $image = new Gallery;
        $image->name = $nameImage;
        $image->type = "image";
        $image->save();

        return $this->sendResponse($image->toArray(), "Image create successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Gallery::find($id);
        if(is_null($image)){
            return $this->sendError('Image not found.');
        }
        return $this->sendResponse($image->toArray(), "Image retrieved successfully.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $image = Gallery::find($id);
        if(is_null($image)){
            return $this->sendError('Image not found.');
        }
        $nameImage   = $this->fileManager->actionImage($image->name);
        $image->name = $nameImage;
        $image->type = "image";
        $image->save();
        return $this->sendResponse($image->toArray(), "Image updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::find($id);

        if(is_null($image)){
            return $this->sendError('Image not found.');
        }else{
            $this->fileManager->actionImage($image->name, "delete");
            $image->delete();
        }

        return $this->sendResponse($image->toArray(), "Image deleted successfully");
    }
}
