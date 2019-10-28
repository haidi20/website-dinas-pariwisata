<?php 
namespace App\Http\Controllers\Sitemanager;

use Illuminate\Http\Request;
use App\Web\Models\Media;

class MediaController extends BaseController
{
	public function __construct(Request $request, Media $media)
    {
        parent::__construct();
		$this->moduleUrl    = $this->baseUrl('media');
		$this->baseTemplate = $this->template('media');
		$this->request      = $request;
		$this->media        = $media;

        view()->share([
            'baseUrl'     => $this->baseUrl(),
            'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => $this->moduleTitle = $request->route('type') == 'medsos' ?  'Media Sosial' : 'Share'
        ]);
    }

    // public function index()
    // {
    //     $url = url($this->moduleUrl, ['type', 'image']);
    //     return redirect($url);
    // }

    public function type($type)
    {
        $q       = request('q');
        $perpage = (request('perpage')) ? request('perpage') : 10;

        $media   = $this->media->where('type', $type);

        if($q){
            $media = $media->search('name', $q);
        }

        $total_record = $media->count();
        $media        = $media->sorted('id', 'DESC')->paginate($perpage);

        return $this->template('index', compact('media', 'total_record', 'type'));
    }

    public function create($type)
    {
        return $this->form($type);
    }

    public function postCreate($type)
    {
        return $this->save($type);
    }

    public function edit($type, $id)
    {
        return $this->form($type, $id);
    }

    public function postEdit($type, $id)
    {
        return $this->save($type, $id);
    }

    public function form($type, $id = null)
    {
        if($id){
            $media = $this->media->find($id);
            session()->flash('_old_input', $media);
        }

        if($type == 'medsos'){
            $media = config('sitemanager.social_media');
        }elseif($type == 'share'){
            $media = config('sitemanager.share');
        }

        return $this->template('form', compact('media', 'type'));
    }

    public function save($type, $id = null)
    {
        $input = $this->request->except('_token');

        $this->validate($this->request, [
            'name' => 'required',
        ]);

        if($type == 'medsos'){
            $this->validate($this->request, [
                'link' => 'required',
            ]);
        }

        if($id) {
            $media = $this->media->find($id);
        }else{
            $media = new $this->media;
        }

        if($type == 'medsos'){
            $media->link = $input['link'];
        }

        $media->name = $input['name'];
        $media->type = $type;
        $media->save();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.$media->name.'" telah disimpan', false);
        return redirect(url($this->moduleUrl, ['type', $type]));
    }

    public function delete($id)
    {
        $media = $this->media->find($id);

        $media->delete();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah dihapus', false);

        return redirect()->back();
    }
}