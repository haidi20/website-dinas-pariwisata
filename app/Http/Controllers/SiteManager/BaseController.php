<?php 
namespace App\Http\Controllers\Sitemanager;

use App\Web\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use Session;

class BaseController extends Controller
{
    protected $baseTemplate = 'sitemanager';

    public function __construct()
    {
        $cmsTitle      = setting('cms.title');
        $this->message = $message = Session::get('message');
        $lastUrl       = collect(request()->segments())->last();
        
        view()->share(compact('lastUrl', 'cmsTitle', 'message'));
    }

    protected function baseUrl($slug = null)
    {
        return 'sitemanager' . (!$slug ?: '/'.$slug);
    }

    protected function moduleUrl($slug = null)
    {
        return $this->moduleUrl . (!$slug ?: '/'.$slug);
    }

    protected function template($file, $data=false)
    {
        $template = $this->baseTemplate . '.' . $file;

        if( $data ){
            return view($template, (array) $data);
        }else{
            return $template;
        }
    }
}