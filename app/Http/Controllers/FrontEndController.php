<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Http\Controllers\FrontBaseController;

class FrontEndController extends FrontBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public $var = array();

    public function __construct()
    {
        parent ::__construct();
    }

    /**
     * Display a listing of the products to show on home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_products = Product::take(12)->get()->toarray();
        return view('front-end.product', ['main_categories' => $this->main_categories, 'home_products' => $home_products]);
    }   

    // public function get_all_categories($parent=0)
    // {   
        
    //     $categories = Category::where('parent_id', $parent)->get()->toarray();

    //     foreach ($categories as $key => $value) 
    //     {
    //         $this->var[] = $value['id'];
    //         $this->get_all_categories($value['id']);
    //     }
        
    // }

    // public function get_products($parent)
    // {
    //     $this->get_all_categories($parent);
    //     $this->var[] = $parent;
    //     $products = Product::whereIn('category_id', $this->var)->get()->toarray();
    //     // dd($products);
    //     $this->var = '';
    // }



    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('category_id', $id)->paginate(8)->toarray();
        return view('front-end.category_products', ['main_categories' => $this->main_categories,'products'=> $products]);
    }

    /**
     * Show the checkout view
     *
     */
    public function checkout(Request $request)
    {
        return view('front-end.checkout', ['main_categories' => $this->main_categories]);
    }

    /**
     * Show the checked-out products with total amount
     *
     */
    public function checkout_products_list()
    {
        $products = $_POST['products'];
        $total = 0;
        
        foreach ($products as $key => $value) 
        {
            $total += $value['quantity'] * $value['price'];
        }
        $data['products'] = $products;
        $data['total'] = $total;
        return json_encode($data);
    }

    /**
     * Show the specified product in modal
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modal_product($id)
    {
        $modal_product = Product::find($id);
        // dd($modal_product);
        return view('front-end.modal_product', ['modal_product' => $modal_product]);
    }

    /**
     * Show the specified product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_single_product($id)
    {
        $product = Product::find($id)->toarray();
        $similar_products = Product::where('category_id', $product['category_id'])->where('id',"<>",$product['id'])->get()->toarray();
        return view('front-end.single_product', ['main_categories' => $this->main_categories,'product'=> $product, 'similar_products' => $similar_products]);
    }
    
}
