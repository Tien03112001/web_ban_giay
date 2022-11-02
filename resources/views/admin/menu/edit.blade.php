@extends('admin.home')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Sửa danh mục</h4>
        <form action="" method="POST" class="forms-sample">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}">
            </div>
            <div class="form-group">
                <label for="parent_id">Loại danh mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{$menu->parent_id==0 ? 'selected' :''}}>Danh mục cha</option>
                    @foreach($menus as $menuParent)
                    <option value="{{$menuParent->id}}" {{$menu->parent_id==$menuParent->id ? 'selected':''}}>
                        {{$menuParent->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="active" value="0" checked name="active" {{$menu->active==0?'checked':''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="unactive" value="1" name="active" {{$menu->active==1?'checked':''}}>
                    <label for="unactive" class="custom-control-label">Không</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>

            @csrf
        </form>
    </div>

</div>
@endsection