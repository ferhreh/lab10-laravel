@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Thêm thương hiệu sản phẩm</header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ route('save.brand') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">Tên thương hiệu</label>
                            <input type="text" name="brand_product_name" class="form-control" id="brand_name" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="brand_slug">Slug</label>
                            <input type="text" name="brand_slug" class="form-control" id="brand_slug" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="brand_desc">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="brand_desc" placeholder="Mô tả thương hiệu"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="brand_status">Hiển thị</label>
                            <select name="brand_product_status" class="form-control">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
