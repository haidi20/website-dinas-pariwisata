<?php 
namespace App\Http\Controllers\Sitemanager;

use App\Web\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
	public function __construct(Request $request)
    {
        parent::__construct();
        $this->moduleUrl    = $this->baseUrl('setting');
        $this->baseTemplate = $this->template('setting');
        $this->request      = $request;

        view()->share([
            'baseUrl'     => $this->baseUrl(),
            'moduleUrl'   => $this->moduleUrl,
            'moduleTitle' => 'Setting'
        ]);
    }

    public function getIndex($page = null)
    {
        switch ($page) {
            case 'contact':
                return $this->formContact($page);
            break;
        }
    }

    public function postIndex($page)
    {
        switch ($page) {
            case 'contact':
                return $this->saveContact($page);
            break;
        }
    }

    public function formContact($page)
    {
        $address = Setting::where('key', 'address')->first()->value;
        $phone   = Setting::where('key', 'phone')->first()->value;
        $fax     = Setting::where('key', 'fax')->first()->value;
        $email   = Setting::where('key', 'email')->first()->value;
        $time    = Setting::where('key', 'time')->first()->value;

        return $this->template('index', compact('page', 'address', 'phone', 'fax', 'email', 'time'));
    }

    public function saveContact($page)
    {
        $input = ['address', 'phone', 'fax', 'email', 'time'];
        foreach($input as $data){
            $request = $this->request->get($data);
            $setting = Setting::where('key', $data)->first();
            $setting->value = (!empty($request)) ? $request : strip_tags($request);
            $setting->save();
        }

        flash_message('message', 'success', 'check', 'Data contact berhasil disetting', false);

        return redirect()->back();
    }
}