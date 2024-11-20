<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BandProduct extends Controller
{
    // Add a new brand
    public function addBrandProduct()
    {
        return view('admin.add_brand_product');
    }

    // Save brand to the database
    public function saveBrandProduct(Request $request)
    {
        $data = [
            'brand_name' => $request->brand_product_name,
            'brand_slug' => $request->brand_slug,
            'brand_desc' => $request->brand_product_desc,
            'brand_status' => $request->brand_product_status,
        ];

        DB::table('tbl_brand')->insert($data);
        return Redirect::to('/add-brand-product')->with('message', 'Thêm thương hiệu thành công!');
    }

    // List all brands
    public function allBrandProduct()
    {
        $all_brand_product = DB::table('tbl_brand')->get();
        return view('admin.all_brand_product', compact('all_brand_product'));
    }

    // Activate brand
    public function activeBrandProduct($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['brand_status' => 0]);
        return Redirect::to('/all-brand-product');
    }

    // Deactivate brand
    public function unactiveBrandProduct($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id', $brand_id)->update(['brand_status' => 1]);
        return Redirect::to('/all-brand-product');
    }

    // Edit brand
    public function editBrandProduct($brand_id)
    {
        $brand = DB::table('tbl_brand')->where('brand_id', $brand_id)->first();
        return view('admin.edit_brand_product', compact('brand'));
    }

    // Update brand
    public function updateBrandProduct(Request $request, $brand_id)
    {
        $data = [
            'brand_name' => $request->brand_product_name,
            'brand_slug' => $request->brand_slug,
            'brand_desc' => $request->brand_product_desc,
        ];

        DB::table('tbl_brand')->where('brand_id', $brand_id)->update($data);
        return Redirect::to('/all-brand-product')->with('message', 'Cập nhật thương hiệu thành công!');
    }

    // Delete brand
    public function deleteBrandProduct($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id', $brand_id)->delete();
        return Redirect::to('/all-brand-product')->with('message', 'Xóa thương hiệu thành công!');
    }
}
