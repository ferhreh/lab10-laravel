@extends('admin_layout')
@section('admin_content')
<h3>Cập nhật danh mục sản phẩm</h3>
<form action="{{ route('update_category_product', ['id' => $category->category_id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="category_name">Tên danh mục</label>
        <input type="text" name="category_product_name" value="{{ $category->category_name }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="slug_category_product">Slug</label>
        <input type="text" name="slug_category_product" value="{{ $category->slug_category_product }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="category_desc">Mô tả</label>
        <textarea name="category_product_desc" class="form-control">{{ $category->category_desc }}</textarea>
    </div>
    <div class="form-group">
        <label for="category_status">Trạng thái</label>
        <select name="category_product_status" class="form-control">
            <option value="0" {{ $category->category_status == 0 ? 'selected' : '' }}>Hiển thị</option>
            <option value="1" {{ $category->category_status == 1 ? 'selected' : '' }}>Ẩn</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection
