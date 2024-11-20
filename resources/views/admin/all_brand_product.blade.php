@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">Liệt kê thương hiệu sản phẩm</div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên thương hiệu</th>
                        <th>Slug</th>
                        <th>Hiển thị</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_brand_product as $brand_pro)
                        <tr>
                            <td>{{ $brand_pro->brand_name }}</td>
                            <td>{{ $brand_pro->brand_slug }}</td>
                            <td>
                                @if ($brand_pro->brand_status == 0)
                                    <a href="{{ URL::to('/unactive-brand-product/' . $brand_pro->brand_id) }}" class="text-success">Hiển thị</a>
                                @else
                                    <a href="{{ URL::to('/active-brand-product/' . $brand_pro->brand_id) }}" class="text-danger">Ẩn</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('editBrandProduct',['id'=>$brand_pro->brand_id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                <a href="{{route('deleteBrandProduct',['id'=>$brand_pro->brand_id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
