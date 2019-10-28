<?php 
namespace App\Http\Controllers\Sitemanager;

use App\Web\Models\Slider;
use App\Web\Services\Filemanager;
use Illuminate\Http\Request;

class SliderController extends BaseController
{

	public function __construct(Request $request, Slider $slider, Filemanager $filemanager)
    {
        parent::__construct();
        $this->moduleUrl    = $this->baseUrl('slider');
        $this->baseTemplate = $this->template('slider');
        $this->request      = $request;
        $this->slider       = $slider;
        $this->filemanager  = $filemanager;

        view()->share([
            'baseUrl'     => $this->baseUrl(),
            'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = 'Slider'
        ]);
    }

    public function index()
    {
        $slider = $this->slider->with('image')->published()->get();
        return $this->template('index', compact('slider'));
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
            $slider = $this->slider->find($id);
            session()->flash('_old_input', $slider);
        }

        $data = [];
        return $this->template('form', compact('data'));
    }

    public function save($id = null)
    {
        $input = $this->request->except('_token');

        if($id){
            $this->validate($this->request, [
                'caption' => 'required'
            ]);    
            
            $slider = $this->slider->find($id);
        }else{
            $this->validate($this->request, [
                'caption' => 'required',
                'file'    => 'required'
            ]);

            $slider = new $this->slider;
        }

        $slider->caption     = $input['caption'];
        $slider->status      = $input['status'];
        $slider->description = $input['description'];

        $slider->save();

        $this->filemanager->upload('file', $slider, 'image');

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah disimpan', false);

        $redirect = url($this->moduleUrl);
        return redirect($redirect);
    }

    public function delete($id)
    {
        $slider = $this->slider->find($id);

        if( ! is_object($slider) ) return false;

        $slider->delete();
        $this->filemanager->delete($slider->image);

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah dihapus', false);
        return redirect()->back();
    }

}