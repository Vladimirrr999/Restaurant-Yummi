<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends BaseController
{
    public function index(){
        return view('gallery', ["data" => $this->data]);
    }
}
