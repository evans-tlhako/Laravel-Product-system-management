<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderPlace;

class PlacesOrderController extends Controller
{
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
            'Price'=>'required',
            'Email'=>'required',
        ]);
       //create Product
       
        $order = new OrderPlace;
        $order->Name = $request->input('Name');
        $order->Price = $request->input('Price');
        $order->Email = $request->input('Email');
        $order->save();
        return redirect('/')->with('success','Order is Placed');
    }
}
