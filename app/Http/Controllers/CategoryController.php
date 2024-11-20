<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    // Hiển thị form thêm danh mục sản phẩm
    public function add_category_product()
    {
        return view('admin.add-category-product');
    }

    // Hiển thị tất cả danh mục sản phẩm
    public function all_category_product()
    {

        // Lấy tất cả danh mục sản phẩm từ bảng
        $all_category_product = DB::table('tbl_category_product')->get();
    
        // Truyền dữ liệu qua view sử dụng compact
        return view('admin.all-category-product', compact('all_category_product'));
    }

    // Lưu danh mục sản phẩm mới
    public function save_category_product(Request $request)
    {

        // Thu thập dữ liệu từ form
        $data = [
            'category_name' => $request->category_product_name,
            'category_product_keywords' => $request->category_product_keywords,
            'slug_category_product' => $request->slug_category_product,
            'category_desc' => $request->category_product_desc,
            'category_status' => $request->category_product_status,
        ];

        // Thêm dữ liệu vào bảng `tbl_category_product`
        DB::table('tbl_category_product')->insert($data);

        // Đặt thông báo thành công
        Session::put('message', 'Thêm danh mục sản phẩm thành công');

        // Chuyển hướng về trang thêm danh mục
        return Redirect::to('add-category-product');
    }

    // Kiểm tra đăng nhập
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function edit_category_product($category_id)
{
    $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_id)->first();
    return view('admin.edit_category_product')->with('category', $edit_category_product);
}

public function update_category_product(Request $request, $category_id)
{
    $data = [
        'category_name' => $request->category_product_name,
        'slug_category_product' => $request->slug_category_product,
        'category_desc' => $request->category_product_desc,
        'category_status' => $request->category_product_status,
    ];

    DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);

    Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
    return Redirect::to('all-category-product');
}
public function delete_category_product($category_id)
{
    DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
    Session::put('message', 'Xóa danh mục sản phẩm thành công');
    return Redirect::to('all-category-product');
}
}
