@extends('admin.home')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Danh sách đơn đặt hàng </h3>
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
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Địa chỉ email</th>
                                        <th>Lưu ý</th>
                                        <th>Trạng thái đơn</th>
                                        <th>Cập nhật lúc </th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $key => $customer)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>0{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->note }}</td>
                                        <td>
                                            @php
                                            if($customer->status==0)
                                            {
                                            echo '<button type="button" class="btn btn-dark">Đang chờ</button>';
                                            }
                                            elseif($customer->status==1)
                                            {
                                            echo '<button type="button" class="btn btn-primary">Đang giao</button>';
                                            }
                                            elseif($customer->status==2)
                                            {
                                            echo '<button type="button" class="btn btn-success">Đã giao</button>';
                                            }
                                            else
                                            {
                                            echo '<button type="button" class="btn btn-danger">Đã hủy</button>';
                                            }
                                            @endphp
                                        </td>
                                        <td>{{ $customer->updated_at }}</td>
                                        <td>
                                            <a href="/admin/order/edit/{{$customer->id}}" class="btn btn-success btn-md">Chi tiết đơn </a>
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