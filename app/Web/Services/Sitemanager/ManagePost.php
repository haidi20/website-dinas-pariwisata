<?php 
namespace App\Web\Services\Sitemanager;

use App\Web\Models\Post\Post;

class ManagePost
{

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

    public function get($slug=null, $type='post', $detail=false, $orderBy='', $notThis=null)
    {
        $post = $this->post->published();

        if( in_array($type, config('sitemanager.posts')) ){
            if(!is_null($slug)){
                $post = $post->slug($slug)->type($type);
            }else{
                $post = $post->type($type);
            }
        }

        if($notThis){
            $post = $post->notThisPost($notThis);
        }

        switch ($orderBy) {
            case 'top':
                $post = $post->popular();
                break;

            case 'new':
                $post = $post->new();
                break;

            case 'desc':
                $post = $post->latest();
                break;
            
            case 'random':
                $post = $post->random();
                break;
        }

        if(is_numeric($detail)){
            if($orderBy == 'top' || $orderBy == 'new'){
                return $post->take($detail)->get();
            }
            else{
                return $post->paginate($detail);
            }
        }else{
            if($detail){
                return $post->first();
            }else{
                return $post->get();
            }
        }
    }

	public function tags($object=null)
    {
    	if($object){
    		$lists = $this->post->type('post')->this($object)->pluck('tags');
    	}else{
        	$lists = $this->post->type('post')->pluck('tags');
    	}

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