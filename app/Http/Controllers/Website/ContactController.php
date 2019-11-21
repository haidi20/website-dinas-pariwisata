<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

use App\Web\Models\Inbox;
use App\Web\Models\Setting;

class ContactController extends BaseController
{
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index(){
        $setting = new Setting;

        if(!$setting->get()->isEmpty()){
            $address = Setting::where('key', 'address')->first()->value;
            $phone   = Setting::where('key', 'phone')->first()->value;
            $fax     = Setting::where('key', 'fax')->first()->value;
            $email   = Setting::where('key', 'email')->first()->value;
            $time    = Setting::where('key', 'time')->first()->value;
        }else{
            $address = '';
            $phone   = '';
            $fax     = '';
            $email   = '';
            $time    = '';  
        }

        return $this->view('website.contact.index', compact('page', 'address', 'phone', 'fax', 'email', 'time'));
    }

    public function store()
    {
        $input = $this->request;

        $inbox = new Inbox;
        $inbox->name = $input->name;
        $inbox->email = $input->email;
        $inbox->phone = $input->phone;
        $inbox->type = 'testimonal';
        $inbox->status = 1;
        $inbox->message = $input->comment;
        $inbox->subject = $input->subject;
        $inbox->save();

        return response()->json([
            'success'=> 200,
            'data' => 'berhasil tambahkan data',
        ]);
    }
}
