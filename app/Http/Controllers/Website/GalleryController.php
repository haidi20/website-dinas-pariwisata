<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

use App\Repositories\GalleryRepository;

class GalleryController extends BaseController
{
    public function __construct(GalleryRepository $galleryRepo)
    {
      $this->galleryRepo = $galleryRepo;  
    }

    public function image()
    {
        $typeGallery = "Image";
        
        $data       = $this->galleryRepo->limitImages(8);
        $countImages= $this->galleryRepo->countImages();

        return $this->view('website.gallery.image.index', compact(
            'data', 'typeGallery', 'countImages'
        ));
    }

    public function more_images()
    {
        return $this->galleryRepo->limitImages(8);
    }

    public function video()
    {
        $typeGallery = "Video";
        
        $data       = $this->galleryRepo->limitVideos(8);
        $countVideos= $this->galleryRepo->countVideos();

        return $this->view('website.gallery.video.index', compact(
            'data', 'typeGallery', 'countVideos'
        ));
    }

    public function more_videos()
    {
        return $this->galleryRepo->limitVideos(8);
    }

    public function detail_video($slug)
    {
        $video  = $this->galleryRepo->baseSlugVideo($slug);
        $videos = $this->galleryRepo->withoutThisVideo($video->id, 5); 

        return $this->view('website.gallery.video.detail-video', compact(
            'video', 'videos'
        ));
    }

    public function create_comment(Request $request)
    {
        return $this->galleryRepo->createCommentVideo($request->comment_thread_id, $request->text);
        // return $request->all();
    }
}
