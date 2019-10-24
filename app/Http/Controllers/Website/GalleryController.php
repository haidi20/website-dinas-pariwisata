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
        $data = $this->galleryRepo->allImage();
        $slide= $this->galleryRepo->imageLimit(3);

        return view('website.gallery.image', compact(
            'data', 'slide', 'typeGallery'
        ));
    }

    public function video()
    {

    }
}
