@extends('admin.home')
@section('content')

<div class="card">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
    <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm</h4>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Tên Sản Phẩm</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Danh Mục</label>
                            <select class="form-control" name="menu_id">
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Giá </label>
                            <input type="number" name="price" value="{{ old('price_sale') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Số lượng </label>
                            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Mô Tả </label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Mô Tả Chi Tiết</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="menu">Ảnh Sản Phẩm</label>
                    <div class="holder">
                        <img id="imgPreview" src="#" alt="pic" width="20%" />
                    </div>
                    <input type="file" name="photograph" id="photo" required="true" />
                </div>

                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="active" name="active" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="no_active" name="active">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection