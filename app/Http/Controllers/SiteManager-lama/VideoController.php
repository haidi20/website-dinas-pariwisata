<?php

namespace App\Http\Controllers\SiteManager;

use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = DB::table('galleries')->where('type', 'video')->orderByRaw('created_at DESC')->get();
        return $this->sendResponse($videos->toArray(),"Videos retrieved successfully.");
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
        $video = Gallery::create($input);
        return $this->sendResponse($video->toArray(),"Video created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Gallery::find($id);

        if(is_null($video)){
            return $this->sendError('Video not found.');
        }

        return $this->sendResponse($video->toArray(), "Video retrieved successfully.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        $video = Gallery::find($id);
        
        if(is_null($video)){
            return $this->sendError('Video not found.');
        }else{
            $video->name = $input['name'];
            $video->link = $input['link'];
            $video->save();
        }

        return $this->sendResponse($video->toArray(), "Video updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Gallery::find($id);

        if(is_null($video)){
            return $this->sendError('Video not found.');
        }else{
            $video->delete();
        }

        return $this->sendResponse($video->toArray(), "Video deleted successfully");
    }
}
