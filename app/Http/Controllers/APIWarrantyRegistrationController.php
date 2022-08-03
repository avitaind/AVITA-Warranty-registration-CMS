<?php

namespace App\Http\Controllers;

use App\Models\Warranty_registration;
use App\Models\product_type;
use App\Models\Product;
use App\Models\product_model;
use App\Models\product_number;
use Illuminate\Http\Request;

class APIWarrantyRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Warranty_registration::all();
        // return Warranty_registration::all();

        if(strlen($request->product_type)>0)
            {
                $result =Warranty_registration::select('product_type', 'product_Series', 'product_model','product_number','serial_number')->Where('product_type', $request->product_type)->get();
                // dd(count($result)==0);
                // dd($result=='NULL');
                if(count($result)==0)
                {
                    return ["result"=>"No data found"];
                }
            }
            // else{
            //     $result = Warranty_registration::get();
            // }
            elseif(strlen($request->product_Series)>0)
            {
                $result =Warranty_registration::select('product_type', 'product_Series', 'product_model','product_number','serial_number')->Where('product_Series',$request->product_Series)->get();
                if(count($result)==0)
                {
                    return ["result"=>"No data found"];
                }
            }
            // else{
            //     $result = Warranty_registration::get();
            // }
            elseif(strlen($request->product_model)>0)
            {
                $result =Warranty_registration::select('product_type', 'product_Series', 'product_model','product_number','serial_number')->Where('product_model', $request->product_model)->get();
                if(count($result)==0)
                {
                    return ["result"=>"No data found"];
                }
            }
            // else{
            //     $result = Warranty_registration::get();
            // }
            elseif(strlen($request->product_number)>0)
            {
                $result =Warranty_registration::select('product_type', 'product_Series', 'product_model','product_number','serial_number')->Where('product_number',$request->product_number)->get();
                if(count($result)==0)
                {
                    return ["result"=>"No data found"];
                }
            }
            // else{
            //     $result = Warranty_registration::get();
            // }
            elseif(strlen($request->serial_number)>0)
            {
                $result =Warranty_registration::select('product_type', 'product_Series', 'product_model','product_number','serial_number')->Where('serial_number',$request->serial_number)->get();
                if(count($result)==0)
                {
                    return ["result"=>"No data found"];
                }
            }
            else{
                $result = Warranty_registration::get();
            }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Warranty_registration;
        $post ->user_name               = $request->user_name;
        $post ->user_email              = $request->user_email;
        $post ->user_phone              = $request->user_phone;
        $post ->product_type            = $request->product_type;
        $post ->product_Series          = $request->product_Series;
        $post ->product_model           = $request->product_model;
        $post ->product_number          = $request->product_number;
        $post ->product_configuration   = $request->product_configuration;
        $post ->serial_number           = $request->serial_number;
        $post ->reseller_name           = $request->reseller_name;
        $post ->purchase_date           = $request->purchase_date;

        $result = $post->save();

        If($result)
        {
            return ["result"=>"Add Data"];
        }
        else{
            return ["result"=>"failed "];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function APIproduct_types(Request $request)
    {
        $result = product_type::select('id','name')->get();
         return $result;
    }

    public function Product(Request $request)
    {
        $result = Product::select('id','name')->get();
         return $result;
    }

    public function product_model(Request $request)
    {
        $result = product_model::select('id','model_number')->get();
         return $result;
    }

    public function product_number(Request $request)
    {
        $result = product_number::select('id','product_number','titleName')->get();
         return $result;
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
    }
}
