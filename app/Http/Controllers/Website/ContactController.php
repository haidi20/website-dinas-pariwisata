<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

use App\Web\Models\Inbox;

class ContactController extends BaseController
{
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index(){
        return $this->view('website.contact.index');
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
