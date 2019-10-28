<?php
namespace App\Http\Controllers\Sitemanager\Post;

use App\Http\Controllers\Sitemanager\BaseController;
use App\Web\Models\Post\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
	public function __construct(Request $request, Category $category)
	{
		parent::__construct();
		$this->request  = $request;
		$this->category = $category;
	}

	public function index()
	{
		$category = $this->category->all();
		return $category->toArray();
	}

	public function edit($id)
    {
        $data = $this->category->find($id);
        if($data){
            $success = true;
        }else{
            $success = false;
        }

        return compact('success', 'data');
    }

	public function save($id = null)
	{
		$input = $this->request->except('_token');
		if($id){
			$category = $this->category->find($id);
		}else{
			$category = $this->category;
		}

		if(empty($input['name'])){
			$success = false;
			$data = $category;
		}else{
			$category->name 	= $input['name'];
			$category->slug 	= str_slug($category->name);
			$category->active 	= 0;
			$category->save();

			$success = true;
			$data = $category;
		}
		
		return compact('success', 'data');
	}

	public function delete($id)
	{
        $category = $this->category->find($id);
        if($category){
            $category->delete();
            $success = true;
        }else{
            $success = false;
        }

        return compact('success', 'category');
    }
}