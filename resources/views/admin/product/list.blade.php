@extends('admin.home')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Danh sách sản phẩm </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền </th>
                                        <th>Mô tả </th>
                                        <th>Mô tả chi tiết </th>
                                        <th>Trạng thái </th>
                                        <th>Cập nhật lúc </th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <a href="/admin/product/edit/{{$product->id}}" class="btn btn-success btn-md">Cập nhật</a>
                                            <a onclick="removeRow(' . $menu->id . ', '/admin/menu/destroy')" class="btn btn-danger btn-md">xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection