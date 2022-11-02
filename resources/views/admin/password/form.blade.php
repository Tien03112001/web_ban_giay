@extends('admin.home')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Đổi mật khẩu </h4>
        <form class="forms-sample" method="post" action="">
            <div class="form-group">
                <label for="exampleInputUsername1">Mật khẩu cũ </label>
                <input type="password" class="form-control" name="curent_password" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu mới</label>
                <input type="password" class="form-control" name="new_password" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nhập lai mật khẩu mới</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary me-2">Đổi mật khẩu </button>
            @csrf
        </form>
    </div>
</div>
@endsection