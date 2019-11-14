<?php 
namespace App\Http\Controllers\Sitemanager;

use Illuminate\Http\Request;
use App\Web\Models\Menu;
use App\Web\Models\Post\Category;

class MenuController extends BaseController
{
	protected $listPosition = ['header' => 'Header', 'footer' => 'Footer'];

	public function __construct(Request $request, Menu $menu)
	{
		parent::__construct();
		$this->request      = $request;
		$this->menu         = $menu;
		$this->moduleUrl    = $this->baseUrl('menu');
		$this->baseTemplate = $this->template('menu');

		view()->share([
			'baseUrl'     => $this->baseUrl(),
			'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = 'Menu'
		]);
	}

	public function index()
	{
		$q       = request('q');
		$perpage = (request('perpage')) ? request('perpage') : 10;
		$parent  = false;

		$menu = $this->menu->isParent();

		if($q){
			$menu = $menu->search('name', $q);
		}

		$total_record = $menu->count();
		$menu         = $menu->sorted('id', 'DESC')->paginate($perpage);

		return $this->template('index', compact('menu', 'parent', 'total_record'));
	}

	public function create($parent=0)
	{
		return $this->form(null, $parent);
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

	public function form($id = null, $parentId=0)
	{
        if($id){
            $menu = $this->menu->find($id);
            session()->flash('_old_input', $menu);
        }

        if($parentId){
            $parent = $this->menu->find($parentId);
        }else{
            if(isset($menu)) $parent = $menu->parent;
        }

		$position  = $this->listPosition;
		$lastOrder = object_get($this->menu->orderBy('order', 'DESC')->first(), 'order', -1);
		$lastOrder++;
		
		$categories= Category::pluck('name', 'id');

		return $this->template('form', compact('parent', 'position', 'lastOrder', 'categories'));
	}

	public function save($id = null)
	{
		$lock = false;
		$input = $this->request->except('_token');

		// return $input;

		$this->validate($this->request, [
            'name' => 'required'
        ]);

		if($id){
            $menu = $this->menu->find($id);
            if($menu->lock) $lock = true;
        }else{
			$menu = new $this->menu;
			// $input['link'] = 'page/'.$input['link'];
		}
		
		$connectCategory = isset($input['connect_category']) ? $input['connect_category'] : 0;

		// kondisi jika menu mengarah ke kategori tertentu
		if($connectCategory == 1){
			$category = Category::find($input['category_id']);
			$link = 'post/'.$category->name;
		}else if($connectCategory == 0){
			$link = ($input['link']) ? 'page/'.$input['link'] : '';
		}

		$menu->name        = $input['name'];
		$menu->icon        = '';
		if(!$lock){
		$menu->link        = $link;
		}
		$menu->active_link = isset($input['active_link']) ? 1 : 0;
		$menu->connect_category = isset($input['connect_category']) ? 1 : 0;
		$menu->position    = $input['position'];
		$menu->order       = $input['order'];
		$menu->color       = $input['color'];
		$menu->status      = $input['status'];
		$menu->parent_id   = array_get($input, 'parent_id', 0);
		$menu->category_id = array_get($input, 'category_id', 0);
		$menu->save();

        $redirect = ($menu->parent_id) ? url($this->moduleUrl, ['parent', $menu->parent_id]) : url($this->moduleUrl);

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.$menu->name.'" telah disimpan', false);
        return redirect($redirect);
	}

	public function getParent($id)
    {
        if( ! $id ) return redirect($this->moduleUrl);

        $q       = request('q');
		$perpage = (request('perpage')) ? request('perpage') : 10;

        $parent   = $this->menu->find($id);
        $menu     = $parent->child()->paginate($perpage);

		$total_record = $menu->count();
		$lastOrder    = object_get($this->menu->orderBy('order', 'DESC')->first(), 'order', -1);
        $lastOrder++;

        return $this->template('index', compact('menu', 'parent', 'lastOrder', 'total_record'));
    }

	public function delete($id)
	{
		$menu = $this->menu->find($id);

        if($menu->child){
            $menu->child()->delete();
        }

        $menu->delete();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.$menu->name.'" telah dihapus', false);
        return redirect()->back();
	}

	public function posEdit($id){
		$menu 			= $this->menu->find($id);
		
		if(!$menu){
			return response()->json(['msg' => 'menu not found!'],404);
		}

		$menu->order   	= $this->request['order'];
		$menu->save();
		return response()->json($menu);
	}
}