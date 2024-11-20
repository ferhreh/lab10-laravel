<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showCategoriesAndBrands()
    {
        // Retrieve categories from the tbl_category_product table
        $categories = DB::table('tbl_category_product')->get();

        // Retrieve brands from the tbl_brand_product table
        $brands = DB::table('tbl_brand')->get();

        // Pass both categories and brands to the view
        return view('layouts.layout', compact('categories', 'brands'));
    }
}
