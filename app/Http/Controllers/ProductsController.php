<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\OrderPlace;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::orderBy('id','asc')->paginate(6);
        $orders = OrderPlace::all();
        return view('dashboard.index',compact(['orders','products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
            'Name'=>'required',
            'sku'=>'required',
            'Price'=>'required',
            'Description' =>'required'
        ]);
       //create Product
       
        $product = new Product;
        $product->Name = $request->input('Name');
        $product->sku = $request->input('sku');
        $product->Price = $request->input('Price');
        $product->Description = $request->input('Description');
        $product->viewcount = "0";
        $product->save();
        return redirect('/Dashboard')->with('success','Product Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.update')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validation
        $this->validate($request,[
            'Name'=>'required',
            'sku'=>'required',
            'Price'=>'required',
            'Description' =>'required'
        ]);
       //Find Product to delete
       
        $product = Product::find($id);
        $product->Name = $request->input('Name');
        $product->sku = $request->input('sku');
        $product->Price = $request->input('Price');
        $product->Description = $request->input('Description');
        $product->save();
        return redirect('/Dashboard')->with('success','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find Product to delete
        $product = Product::find($id);
        $product->delete();
        return redirect('/Dashboard')->with('success','Product Deleted');
    }
}
