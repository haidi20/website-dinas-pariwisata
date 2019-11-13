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
        $lists = config('sitemanager.share');

        $media = $this->media->where('status', 1);
        
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