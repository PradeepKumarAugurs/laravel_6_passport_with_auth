<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Validator;
class Products extends Controller
{
    public function save_products(Request $request)
    {
       $validator=Validator::make($request->all(),['name'=>'required','price'=>'required','category'=>'required']);
       if ($validator->fails()) 
       {
           return response()->json(['success'=>false,'msg'=>$validator->errors()]);
       }
       else
       {
           $ins['name']=$request->name;
           $ins['category']=$request->category;
           $ins['price']=$request->price;
           $insert_result=Product::insert_data($ins);
           return $insert_result?['result'=>true,'msg'=>'Product added successfully..']:['result'=>false,'msg'=>'Somthing Went Wrong'];
        }

    }
    
    public  function  update_product(Request $request)
    {
        foreach($request->input() as $key=>$row)
        {
            $update_data[$key]=$row?$row:'';
        }
        $update_result=Product::update_data('id',$request->id,$update_data); 
        return $update_result?['success'=>true,'msg'=>'data updated successfully..']:['result'=>false,'msg'=>'Somthing Went Wrong'];
    }
}
