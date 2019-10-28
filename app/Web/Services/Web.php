<?php 
namespace App\Web\Services;

use App\Web\Models\Post\Category;
use App\Web\Models\Post\Post;
use App\Web\Models\Setting;

use App\Web\Services\Sitemanager\ManageGallery;
use App\Web\Services\Sitemanager\ManagePost;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;

use Session;

class Web
{

	public function __construct(Request $request, ManagePost $post, ManageGallery $gallery, Setting $setting)
    {
        $this->request = $request;
        //$this->session = $request->session();
        $this->post    = $post;
        $this->gallery = $gallery;
        $this->setting = $setting;
    }

    public function checkPost($category, $slug=null)
    {
        if(is_null($slug)){
            $check = count($this->page($category));
        }else{
            $check = count($this->post($category, $slug));
        }

        return $check > 0;
    }

    public function readPost($slug, $category=null)
    {
        $post = $category ? $this->post($category, $slug) : $this->page($slug);

        if( ! $post ) return abort(404);

        /* Read */
        //if( ! $this->session->get('read.' . $post->url ) ){
        if( ! Session::get('read.' . $post->url ) ){
            $post->increment('read');
            Session::put('read.' . $post->url, true);
        }

        return $post;
    }

    public function page($slug)
    {
        return Post::published()->where(function($query) use ($slug){
            $query->where('slug', $slug);
            $query->where('category_id', 0);
        })->first();
    }

    public function post($category, $slug=null)
    {
        return Post::published()->with('category')->whereHas('category', function($query) use($category){
            $query->where('slug', $category);
        })->where('slug', $slug)->first();
    }

    public function category($slug, callable $callback=null)
    {
        $category = Category::slug($slug)->has('posts')->first();
        $posts = empty($category) ? null : $category->posts()->latest()->published()->paginate(20);

        if(is_callable($callback)){
            return $callback($category, $posts);
        }else{
            return compact('category', 'posts');
        }
    }

    public function posts($slug = null, $type='post', $detail = false, $orderBy = '', $notThis = null)
    {
        return $this->post->get($slug, $type, $detail, $orderBy, $notThis);
    }

    public function postTags()
    {
        return $this->post->tags();
    }

    public function postCategory()
    {
        return Category::all();
    }

    public function gallery($slug = null, $type='all', $detail = false, $orderBy = '', $notThis = null)
    {
        return $this->gallery->get($slug, $type, $detail, $orderBy, $notThis);
    }

    public function galleryTags($gallery)
    {
        return $this->gallery->tags($gallery);
    }

    public function contact($key)
    {
        $contact = $this->setting->key($key)->first();
        return $contact->value;
    }
}