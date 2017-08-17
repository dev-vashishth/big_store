<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories AS c1')
                            ->select('c1.name','c1.id', 'c2.name as parent_name')
                            ->leftJoin('categories AS c2', 'c1.parent_id', '=', 'c2.id')
                            ->paginate(10);

        foreach ($categories as $key => $value) 
        {
            $subcategories = DB::table('categories')
                                    ->select('name')
                                    ->where('parent_id', '=', $value->id)
                                    ->get();

            $subcategories = json_decode(json_encode($subcategories));
            $subcategories = array_map(function($x) { return $x->name; },$subcategories);

            $categories[$key]->subcategories = $subcategories;
        }

        return view('admin.categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all()->toarray();
        $categories =  array_column($categories, 'name','id');        
        return view('admin.add_category_form',['categories' => $categories]);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), Category::$rules);

        if ($validator->passes())
        {
            $category = new Category([
                            'name' => $request->get('name'),
                            'parent_id' => $request->get('parent_category_id'),
                            ]);
            $category->save();
            return redirect('/categories')->with('message', 'Record added succesfully !');
        }
        else
        {
            return redirect('/categories/create')->withErrors($validator);
        }
        
    }

    /**
     * Display the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->toarray();
        $categories =  array_column($categories, 'name','id');
        $category = Category::find($id);
        return view('admin.edit_category_form', ['category' => $category,'categories' => $categories]);
    }

    /**
     * Update the specified resource in category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), Category::$rules);
        $category = Category::find($id);

        if ($validator->passes())
        {

           $category->name = $request->get('name');
           $category->parent_id = $request->get('parent_category_id');
        
            $category->save();
            return redirect('/categories')->with('message', 'Record added succesfully !');
        }
        else
        {
            return redirect("/categories/".$id."/edit")->withErrors($validator);
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        $update = Category::where('parent_id', $id)
                            ->update(['parent_id' => 0]);
        return redirect('/categories')->with('message', 'Record deleted succesfully !');
    }
}
