<?php
namespace App\Http\Controllers\Sitemanager\Post;

use App\Http\Controllers\Sitemanager\BaseController;
use App\Web\Models\Post\Category;
use App\Web\Models\Post\Post;
use App\Web\Services\Sitemanager\ManagePost;
use App\Web\Services\Filemanager;
use Illuminate\Http\Request;

use Auth;

class PostController extends BaseController
{
	public function __construct(Request $request, Post $post, Category $category, Filemanager $filemanager, ManagePost $service)
	{
		parent::__construct();
		$this->moduleUrl    = $this->baseUrl('post');
		$this->baseTemplate = $this->template('post');
		$this->request      = $request;
		$this->post         = $post;
		$this->category     = $category;
		$this->service      = $service;
		$this->filemanager  = $filemanager;

		view()->share([
            'baseUrl'     => $this->baseUrl(),
            'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = 'Post',
            'tags'        => json_encode($this->service->tags())
		]);
	}

	public function index()
	{
		$q       = request('q');
		$by      = request('by');
		$perpage = (request('perpage')) ? request('perpage') : 10;

		$posts = $this->post->type('post');

		if($by){
			$posts = $posts->search($by, $q);
		}

		$total_record = $posts->count();
		$posts        = $posts->latest()->paginate($perpage);

        return $this->template('index', compact('posts', 'total_record'));
	}

	public function breaking_news()
	{
		return view('sitemanager.post.breaking_news.index');
	}

	public function create()
	{
		return $this->form();
	}

	public function edit($id)
	{
		return $this->form($id);
	}

	public function postCreate()
	{
		return $this->save();
	}

	public function postEdit($id)
	{
		return $this->save($id);
	}

	public function form($id=null)
	{
		if($id)
		{
			$post = $this->post->find($id);
			session()->flash('_old_input', $post);
		}

		$categories = $this->category->pluck('name', 'id');
		return $this->template('form', compact('categories'));
	}

	public function save($id=null)
	{
		$input = $this->request->except('_token');

		$this->validate($this->request, [
            'title' => 'required'
        ]);

		if($id){
			$post = $this->post->find($id);
		}else{
			$post = new $this->post;
		}

		$post->category_id = $input['category_id'];
		$post->tags        = $input['tags'];
		$post->title       = $input['title'];
		$post->menu_id     = 3;
		$post->slug        = str_slug($input['title'], '-');
		$post->content     = $input['content'];
		$post->type        = 'post';
		$post->status      = $input['status'];
		$post->author_id   = Auth::user()->id;
		$post->read 	   = 0;

		$post->save();

		if(isset($input['file'])){
			$image = $this->filemanager->upload('file', $post, 'file');
		}

		flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.str_limit($post->title, 40).'" telah disimpan', false);

		$redirect = url($this->moduleUrl);
		return redirect($redirect);
	}

	public function delete($id)
    {
        $post = $this->post->find($id);

        if( ! is_object($post) ) return false;

        $post->delete();
        $this->filemanager->delete($post->file);

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah dihapus', false);

        return redirect()->back();
    }
}