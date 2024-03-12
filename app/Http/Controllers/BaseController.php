<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;

class BaseController extends Controller
{
     public $data;
     public function __construct()
     {
        $this->data['menu'] = Navigation::all();
     }
}
