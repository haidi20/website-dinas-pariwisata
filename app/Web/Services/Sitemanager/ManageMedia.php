<?php 
namespace App\Web\Services\Sitemanager;

use App\Web\Models\Media;

class ManageMedia
{

	public function __construct(Media $media)
	{
		$this->media = $media;
	}

	public function listMedia($type, $id = null)
    {
        if($type == 'medsos'){
            $lists = config('sitemanager.social_media');
        }elseif($type == 'share'){
            $lists = config('sitemanager.share');
        }

        $media = $this->media->where('type', $type);
        
        if($id){
            $media = $media->where('id', '!=', $id);
        }
        
        $media = $media->pluck('name')->toArray();
        
        $data = [];
        foreach ($lists as $index => $item) {
            if(!in_array($item, $media)){
                array_push($data, $item);
            }
        }

        return $data;
    }

}