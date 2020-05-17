<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','category','price'];

    public  static  function insert_data($ins_data)
    {
        return Product::create($ins_data);
    }
    
    public static  function  update_data($column,$value,$updated_data)
    {
        return Product::where($column,$value)->update($updated_data);
    }
}
