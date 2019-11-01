<?php

namespace App\Repositories;

use App\Web\Models\Post\Post;
use App\Web\Models\Post\Category;

class PostRepository {

    public function all(){
        return Post::type('post')->all();
    }

    public function page($page=null){
        return Post::type('page')->where('slug', $page)->first();
    }

    public function limit($limit){
        return Post::type('post')->inRandomOrder()->limit($limit)->get();
    }

    public function first(){
        return Post::type('post')->first();
    }

    public function last($limit = null){
        return Post::type('post')->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function popular($limit = null){
        return Post::type('post')->orderBy('read', 'desc')->limit($limit)->get();
    }
    
    public function breakingNews(){
        return Post::type('post')->where('breaking_news', 1)->get();
    }

    public function baseSlug($slug){
        $post = Post::type('post')->where('slug', $slug);

        $post->increment('read');

        return $post->first();
    }

    public function baseCategory($category, $idPost = null, $limit = null){
        return Post::type('post')->where('category_id', $category)->where('id', '!=', $idPost)->limit($limit)->get();
    }

    public function paginate($limit = null){
        return Post::type('post')->paginate($limit);
    }

    public function filter($limit = nul, $type = "all", $slug = null, $category = null){
        $post = Post::type('post');

        if($slug){
            $post = $post->slug($slug);
        }

        if(request('search')){
            $post = $post->search('title', request('search'));
        }

        if(request('last')){
            $post = $post->orderBy('created_at', 'desc');
        }

        if($category){
            $category = Category::where('slug', $category)->first();
            $post = $post->category($category->id);
        }

        if($type == 'all'){
            return $post->paginate($limit);
        }else{
            return $post->first();
        }
    }

    public function tags($id = null, $object=null)
    {
        if($id){
            $post = Post::where('id', $id);
        }else{
            $post = new Post;
        }

    	if($object){
    		$lists = $post->type('post')->this($object)->pluck('tags');
    	}else{
        	$lists = $post->type('post')->pluck('tags');
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