<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Http\Controllers\FrontBaseController;	

class CheckoutController extends FrontBaseController
{
    public function __construct()
    {
    	parent::__construct();
    }

    public function index()
    {
    	return view('front-end.checkout', ['main_categories' => $this->main_categories]);
    }
}
