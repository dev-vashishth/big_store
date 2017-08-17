<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    protected $fillable = ['name','parent_id'];

    public static $rules = array(
        'name'             		=> 'required',                        
        'parent_category_id'    => 'required',     
    );

    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
