<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

use App\Models\Menu as ModelsMenu;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{

    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function add()
    {
        return view('admin.menu.add', [
            'title' => 'Trang thêm sản phẩm',
            'menus' => $this->menuService->getParent(),
        ]);
    }
    public function store(Request $request)
    {
        foreach ($request->input() as $key => $value) {
            if ($value == null) {
                toastr()->error('Email hoặc password sai , xin mời nhập lại');
                return redirect()->back();
            }
        }
        $result = $this->menuService->create($request);
        return redirect()->back();
    }
    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Trang danh sách sản phẩm',
            'menus' => $this->menuService->getAll(),
        ]);
    }
    public function show($slug)
    {

        $menu = ModelsMenu::where('slug', $slug)->first();
        return view('admin.menu.edit', [
            'title' => 'Cập nhật danh mục',
            'menus' => $this->menuService->getAll(),
            'menu' => $menu,
        ]);
    }
    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json(
                [
                    'error' => false,
                    'message' => 'Xóa thành công danh mục'
                ]
            );
        } else {
            return response()->json(
                [
                    'error' => true,
                ]
            );
        }
    }
    public function update($slug, Request $request)
    {
        $menu = ModelsMenu::where('slug', $slug)->first();
        if ($this->menuService->update($menu, $request)) {
            toastr()->success('Sửa danh mục thành công ');
            return redirect('./admin/menu/list');
        } else {
            toastr()->error('Vui lòng nhập lại đầy đủ thông tin');
            return Redirect::back();
        }
    }
}
