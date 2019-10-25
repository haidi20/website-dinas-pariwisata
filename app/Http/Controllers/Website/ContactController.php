<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

class ContactController extends BaseController
{
    public function __construct(){

    }

    public function index(){
        return $this->view('website.contact.index');
    }
}
