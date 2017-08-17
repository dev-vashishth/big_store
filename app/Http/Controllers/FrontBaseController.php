<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

class FrontBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cdata;
    protected $main_categories;
    
    public function __construct()
    {
        
        $this->main_categories = Category::where('parent_id',0)->get()->toarray();

        foreach ($this->main_categories as $key => $value) 
        {
            $sub_categories = DB::table('categories')
                                    ->select('name','id')
                                    ->where('parent_id', '=', $value['id'])
                                    ->get()->toarray();
            $this->main_categories[$key]['sub_categories'] = $sub_categories;
        }

        return $this->main_categories;
    }   

    
}

