<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomepageController extends Controller
{
    public $data;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data = array();
        $data['actions'] = Product::with('categories')->byCategoryName('Акции')->get();
        return view('homepage')->with('data', $data);
    }
}
