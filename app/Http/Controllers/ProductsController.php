<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index () {

        $price  = 100000;

        
        // return view('products.index', compact('price'));

        $myphone = [
            'name' => "iphone 14 promax",
            'year' => 2022,
            'isFavorited' => true,
        ] ;
        
        return \view('products.index', compact('myphone'));

    }
}
