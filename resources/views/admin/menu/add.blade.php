@extends('admin.home')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Thêm danh mục</h4>
        <form action="" method="POST" class="forms-sample">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="parent_id">Loại danh mục</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="0">Danh mục cha</option>
                    @foreach($menus as $menu)
                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Kích hoạt</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="active" id="active" value="0" checked> Có <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="active" id="active" value="1"> Không <i class="input-helper"></i></label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>

            @csrf
        </form>
        <!-- <button class="btn btn-outline-primary" onclick="noti()">Click here!</button> -->
    </div>

</div>
@endsection