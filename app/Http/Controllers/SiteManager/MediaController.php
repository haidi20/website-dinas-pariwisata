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
            'moduleTitle' => $this->moduleTitle = 'Media Sosial'
        ]);
    }

    public function index()
    {
        $q       = request('q');
        $perpage = (request('perpage')) ? request('perpage') : 10;

        $media   = $this->media;

        if($q){
            $media = $media->search('name', $q);
        }

        $total_record = $media->count();
        $media        = $media->sorted('id', 'DESC')->paginate($perpage);

        return $this->template('index', compact('media', 'total_record'));
    }

    public function create()
    {
        return $this->form();
    }

    public function postCreate()
    {
        return $this->save();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function postEdit($id)
    {
        return $this->save($id);
    }

    public function form($id = null)
    {
        if($id){
            $media = $this->media->find($id);
            session()->flash('_old_input', $media);
        }

        $social_media = config('sitemanager.social_media');
        return $this->template('form', compact('social_media'));
    }

    public function save($id = null)
    {
        $input = $this->request->except('_token');

        $this->validate($this->request, [
            'name' => 'required',
            'link' => 'required'
        ]);

        if($id) {
            $media = $this->media->find($id);
        }else{
            $media = new $this->media;
        }

        $media->name = $input['name'];
        $media->link = $input['link'];
        $media->save();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' "'.$media->name.'" telah disimpan', false);
        return redirect(url($this->moduleUrl));
    }

    public function delete($id)
    {
        $media = $this->media->find($id);

        $media->delete();

        flash_message('message', 'success', 'check', 'Data '.strtolower($this->moduleTitle).' telah dihapus', false);

        return redirect()->back();
    }
}