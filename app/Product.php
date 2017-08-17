<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'image', 'name', 'price', 'quantity', 'details'];
    public static $rules = array(
    		'name'			=> 'required',                        
        	'category_id'   => 'required', 
        	// 'image'			=> 'required_if:_method,==,NULL|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        	'price'			=> 'required',
        	'quantity'		=> 'required',
        	'details'		=> 'required',
            
    	);

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
