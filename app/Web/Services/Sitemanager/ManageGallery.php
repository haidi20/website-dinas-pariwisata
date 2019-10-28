<?php 
namespace App\Web\Services\Sitemanager;

use App\Web\Models\Gallery;

use Illuminate\Http\Request;

use Auth;

class ManageGallery
{

	public function __construct(Gallery $gallery)
	{
		$this->gallery = $gallery;
	}

	public function get($slug=null, $type='all', $detail=false, $orderBy='', $notThis=null)
    {
        $gallery = $this->gallery->with('image');

        if( in_array($type, config('sitemanager.gallery')) ){
            if(!is_null($slug)){
                $gallery = $gallery->slug($slug)->type($type);
            }else{
                $gallery = $gallery->type($type);
            }
        }

        if($notThis){
            $gallery = $gallery->notThisGallery($notThis);
        }

        switch ($orderBy) {
            case 'desc':
                $gallery = $gallery->latest();
                break;
            
            case 'random':
                $gallery = $gallery->random();
                break;
        }

        if(is_numeric($detail)){
            return $gallery->paginate($detail);
        }else{
            if($detail){
                return $gallery->first();
            }else{
                return $gallery->get();
            }
        }
    }

	public function tags($gallery)
    {
        $lists = $gallery->pluck('tags');

        $tags = [];
        foreach($lists as $item){
            foreach(explode(',', $item) as $subitem){
                if($subitem){
                    if( ! in_array($subitem, $tags) ){
                        $tag = [
                            'name' => $subitem,
                            'value' => $subitem
                        ];
                        array_push($tags, $subitem);
                    }
                }
            }
        }

        return $tags;
    }

}