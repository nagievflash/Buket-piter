<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bouquet;

class BouquetController extends Controller
{
    public $product;

    public function index($slug) {
        $this->product = Bouquet::where('slug', $slug)->firstOrFail();
        return view('layouts.product.item')->with('product', $this->product);
    }
}
