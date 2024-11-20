@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/update-brand-product/' . $brand->brand_id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" name="brand_product_name" class="form-control" value="{{ $brand->brand_name }}" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="brand_slug" class="form-control" value="{{ $brand->brand_slug }}" id="exampleInputEmail1" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu">{{ $brand->brand_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="1" {{ $brand->brand_status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                <option value="0" {{ $brand->brand_status == 0 ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
