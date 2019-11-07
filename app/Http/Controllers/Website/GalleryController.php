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
        $data = $this->galleryRepo->allImages();

        return $this->view('website.gallery.image', compact(
            'data', 'typeGallery'
        ));
    }

    public function video()
    {
        $typeGallery = "Video";
        $data = $this->galleryRepo->limitVideos(8);

        return $this->view('website.gallery.video', compact(
            'data', 'typeGallery'
        ));
    }

    public function detail_video($slug)
    {
        $video  = $this->galleryRepo->baseSlugVideo($slug);
        $videos = $this->galleryRepo->withoutThisVideo($video->id, 10); 

        return $this->view('website.gallery.detail-video', compact(
            'video', 'videos'
        ));
    }
}
