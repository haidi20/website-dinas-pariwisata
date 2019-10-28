<?php 
namespace App\Http\Controllers\Sitemanager;

use Illuminate\Http\Request;
use App\Web\Models\Post\Post;
use App\Web\Models\Menu;

use Auth;

class PageController extends BaseController
{

	public function __construct(Request $request, Post $post, Menu $menu)
	{
		parent::__construct();
		$this->moduleUrl    = $this->baseUrl('page');
		$this->baseTemplate = $this->template('post');
		$this->request      = $request;
		$this->post         = $post;
		$this->menu         = $menu;

		view()->share([
			'baseUrl'     => $this->baseUrl(),
			'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = 'Page'
		]);
	}

	public function index()
	{
		$q       = request('q');
		$by      = request('by');
		$perpage = (request('perpage')) ? request('perpage') : 10;

		$posts = $this->post->type('page');

		if($by){
			$posts = $posts->search($by, $q);
		}

		$total_record = $posts->count();
		$posts        = $posts->latest()->paginate($perpage);

        return $this->template('index', compact('posts', 'total_record'));
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

	public function menu()
    {
        $link = $this->menu->all();
        return $link->toArray();
    }

	public function form($id=null)
	{
		if($id)
		{
			$post = $this->post->find($id);
			session()->flash('_old_input', $post);
		}

		$link = $this->menu->pluck("link", "id");

		return $this->template('form', compact('link'));
	}

	public function save($id=null)
	{
		$input = $this->request->except('_token');

		if($id){
			$post = $this->post->find($id);
		}else{
			$post = new $this->post;
		}

		$post->title       = $input['title'];
		$post->menu_id     = 2;
		$post->slug        = str_slug($input['link']);
		$post->content     = $input['content'];
		$post->type        = 'page';
		$post->status      = $input['status'];
		$post->author_id   = Auth::user()->id;

		$post->save();

		flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah disimpan', false);

		$redirect = url($this->moduleUrl);
		return redirect($redirect);
	}

	public function delete($id)
    {
        $post = $this->post->find($id);

        if( ! is_object($post) ) return false;

        $post->delete();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah dihapus', false);
        return redirect()->back();
    }
}