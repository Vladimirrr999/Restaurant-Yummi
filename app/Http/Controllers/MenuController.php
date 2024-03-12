<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    public function index()
    {
        $this->data['products'] = Product::all();
        $this->data['menuProducts'] = Menu::all();
        return view('menu', ["data" => $this->data]);
    }
}
