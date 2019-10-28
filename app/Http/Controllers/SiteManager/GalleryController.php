<?php 
namespace App\Http\Controllers\Sitemanager;

use App\Web\Models\Gallery;
use App\Web\Services\Sitemanager\ManageGallery;
use App\Web\Services\Filemanager;
use Illuminate\Http\Request;

use Auth;

class GalleryController extends BaseController
{
	public function __construct(Request $request, Gallery $gallery, ManageGallery $service, Filemanager $filemanager)
    {
        parent::__construct();
        $this->moduleUrl    = $this->baseUrl('gallery');
        $this->baseTemplate = $this->template('gallery');
        $this->request      = $request;
        $this->gallery      = $gallery;
        $this->service      = $service;
        $this->filemanager  = $filemanager;

        view()->share([
            'baseUrl'     => $this->baseUrl(),
            'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = 'Gallery'
        ]);
    }

    public function index()
    {
        $url = url($this->moduleUrl, ['type', 'image']);
        return redirect($url);
    }

    public function type($type)
    {
        $gallery = $this->service->get(null, $type, 12, 'desc');
        $tags    = $this->service->tags($gallery);

        return $this->template('index', compact('gallery', 'type', 'tags'));
    }

    public function create($type)
    {
        return $this->form($type);
    }

    public function edit($type, $id)
    {
        return $this->form($type, $id);
    }

    public function postCreate($type)
    {
        return $this->save($type);
    }

    public function postEdit($type, $id)
    {
        return $this->save($type, $id);
    }

    public function form($type, $id=null)
    {
        if($id){
            $gallery = $this->gallery->find($id);
            session()->flash('_old_input', $gallery);
        }

        $gallery = $this->service->get(null, $type, false, 'desc', null, true);
        $tags = json_encode($this->service->tags($gallery));

        return $this->template('form', compact('tags', 'type'));
    }

    public function save($type, $id=null)
    {
        $input = $this->request->except('_token');

        $this->validate($this->request, [
            'caption' => 'required',
        ]);

        if($id){
            $gallery = $this->gallery->find($id);
        }else{
            $gallery = new $this->gallery;
        }

        if($input['type'] === 'video'){
            $gallery->link = $input['link'];
        }

        $gallery->type        = $input['type'];
        $gallery->caption     = $input['caption'];
        $gallery->slug        = str_slug($input['caption']);
        if($input['type'] != 'plant'){    
        $gallery->tags        = $input['tags'];
        }
        $gallery->description = $input['description'];
        $gallery->author_id   = Auth::user()->id;

        $gallery->save();

        $this->filemanager->upload('image', $gallery, 'image');

        $redirect = url($this->moduleUrl, ['type', $type]);

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah disimpan', false);
        return redirect($redirect);
    }

    public function delete($type, $id)
    {
        $gallery = $this->gallery->find($id);

        if( ! is_object($gallery) ) return false;

        $gallery->delete();
        $this->filemanager->delete($gallery->file);

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah dihapus', false);
        return redirect()->back();
    }
}