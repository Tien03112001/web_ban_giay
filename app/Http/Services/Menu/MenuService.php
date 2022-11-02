<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function getAll()
    {
        return Menu::orderbyDESC('id')->paginate(20);
    }
    public function create($request)
    {
        try {
            $data = $request->input();
            Menu::create([
                'name' => (string) $data['name'],
                'parent_id' => (int) $data['parent_id'],
                'active' => (int) $data['active'],
                'slug' => Str::slug($data['name'], '-')
            ]);
            toastr()->success('Tạo danh mục thành công ');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
        }
    }
    public function destroy($request)
    {
        $menu = Menu::where('id', $request->input('id'))->first();
        if ($menu) {
            return Menu::where('id', $request->input('id'))->orWhere('parent_id', $request->input('id'))->delete();
        }
        return false;
    }
    public function update($menu, $request)
    {
        if ((string)$request->input('name') == '') {
            return false;
        } else {
            $menu->name = (string)$request->input('name');
            $menu->active = (int)$request->input('active');
            $menu->parent_id = (string)$request->input('parent_id');
            $menu->save();
            return true;
        }
    }
}
