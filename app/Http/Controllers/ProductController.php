<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->load('category');
        return view('admin.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.add_product_form', ['categories' => $categories]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = Product::$rules;
        $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $image = $request->file('image');
            $file_name = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('/images/products/');
            $product = new Product([
                            'name' => $request->get('name'),
                            'category_id' => $request->get('category_id'),
                            'image' => $file_name,
                            'price' => $request->get('price'),
                            'quantity' => $request->get('quantity'),
                            'details' => $request->get('details')
                            ]);

            if ($product->save())
            {
                $image->move($destinationPath, $file_name);
                return redirect('/products')->with('message', 'Record added succesfully !');
            }
            else
            {
                return  redirect('/products/create')->with('message', 'Record added succesfully !')->withInput();
            }
            
        }
        else
        {
            return redirect('/products/create')->withErrors($validator);
        }

    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories =  array_column(Category::all()->toarray(), 'name','id');
        $product = Product::find($id);
        return view('admin.edit_product_form', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), Product::$rules);
        $product = Product::find($id);

        if ($validator->passes())
        {
            $image = $request->file('image');
            $destinationPath = public_path('/images/products/');
            $old_image = public_path('/images/products/') . $product->image;

            if ($image)
            {
                $file_name = time() . '_' . $image->getClientOriginalName();
                $product->image = $file_name;
            }

            $product->name = $request->get('name');
            $product->category_id = $request->get('category_id');
            $product->price = $request->get('price');
            $product->quantity = $request->get('quantity');
            $product->details = $request->get('details');

            if ($product->save())
            {

                if ($image)
                {
                    File::delete($old_image);
                    $image->move($destinationPath, $file_name);
                }

                return redirect('/products')->with('message', 'Record edited succesfully !');
            }
            else
            {
                return redirect("/products/".$id."/edit")->withErrors($validator);
            }

        }
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $product = Product::find($id);
        $image = public_path('/images/products/') . $product->image;
        $product->delete();
        File::delete($image);
        return redirect('/products')->with('message', 'Record deleted succesfully !');
    }

}
