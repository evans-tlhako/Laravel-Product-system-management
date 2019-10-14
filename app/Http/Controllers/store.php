<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class store extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title =  'Store';
        $products =  Product::all();
        return view('store.index',compact(['title','products']));
    }
}
