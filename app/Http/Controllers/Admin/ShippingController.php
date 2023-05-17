<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Shipping;
// use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function updatevalidator(array $data)
     {
         return Validator::make($data, [
             'country' => ['required', 'string', 'max:50'],
             'price' => ['required', 'string', 'max:50'],
         ]);
     }

    public function index()
    {
        //
        $shippings = Shipping::all();
        return view('admin.shipping.list',compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'price' => 'required',
          ]);
          if ($validator->fails()) {
              return redirect('add_faq_title')
                          ->withErrors($validator)
                          ->withInput();
          }
          Shipping::create([
            'country' => $request->country,
            'price' => $request->price,
          ]);
          return redirect()->route('shippings.store')->with('success','Your Package is successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $shipping = Shipping::findOrFail($id);
        return view('admin.shipping.edit',compact('shipping'));
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
        //
        $valid=$this->updatevalidator($request->except('_token'));
        if( $valid->fails())
        {   
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $update_shipping = Shipping::findOrFail($id);
        
       
        // dd($photo);
        
        $update_shipping->country = $request->country;
        $update_shipping->price = $request->price;
       $result = $update_shipping->update();
        return redirect()->route('shippings.index')->with('update','Your Package is successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete_shipping = Shipping::findOrFail($id);
        $delete_shipping->delete();
        return redirect()->route('shippings.index')->with("delete",'Your Package is successfull Deleted');
    }
}
