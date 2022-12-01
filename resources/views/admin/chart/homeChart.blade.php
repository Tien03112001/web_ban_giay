@extends('admin.home')
@section('content')
<div class="card">
    <div class="card-body">
        <form class="forms-sample">
            <div class="form-group">
                <label for="name">Ngày bắt đầu</label>
                <input type="date" id="date_start" name="date_start">
            </div>
            <div class="form-group">
                <label for="name">Ngày kết thúc</label>
                <input type="date" id="date_finish" name="date_finish">
            </div>
            <input type="button" id="btn-export-quantity-data" class="btn btn-primary me-2" value="Xuất biểu đồ sản phẩm bán chạy">
            <input type="button" id="btn-export-price-data" class="btn btn-primary me-2" value="Xuất biểu đồ doanh thu">
            @csrf
        </form>
    </div>
</div>
@include('admin.chart.chart');
@endsection