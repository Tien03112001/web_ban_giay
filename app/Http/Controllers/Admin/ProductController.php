<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductAdminService;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    protected $productAdminService;
    public function __construct(ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.list', [
            'title' => 'Tranggg danh sách sản phẩm',
            'products' => $this->productAdminService->getAll(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Trang thêm sản phẩm',
            'menus' => $this->productAdminService->getMenu(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->productAdminService->create($request);
        if ($result) {
            toastr()->success('Thêm sản phẩm thành công ');
            return Redirect::back();
        } else {
            toastr()->error('Vui lòng nhập lại đầy đủ thông tin');
            return Redirect::back();
        }

        // dd($request->hasfile('photograph'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', [
            'title' => 'Trang sửa sản phẩm',
            'menus' => $this->productAdminService->getMenu(),
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        if ($this->productAdminService->update($product, $request)) {
            toastr()->success('Sửa sản phẩm thành công ');
            return redirect('./admin/product/list');
        } else {
            toastr()->error('Vui lòng nhập lại đầy đủ thông tin');
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ProductByMenu($slug)
    {
        $menu = Menu::where('slug', $slug)->get();
        $products = Product::where('menu_id', $menu[0]->id)->where('active', 0)->get();
        return view('customer.productbymenu', [
            'title' => 'Trang sản phẩm',
            'menus' => $this->productAdminService->getMenu(),
            'products' => $products,
            'menu_id' => $menu[0]->id,
        ]);
    }
    public function filter_price_product(Request $request)
    {
        $data = $request->all();
        if ($data['value'] == 0) {
            $products = Product::where('active', 0)->Where('menu_id', $data['menu_id'])->get();
        } elseif ($data['value'] == 1) {
            $products = Product::whereBetween('price', [0, 300000])->Where('menu_id', $data['menu_id'])->get();
        } elseif ($data['value'] == 2) {
            $products = Product::whereBetween('price', [300000, 500000])->Where('menu_id', $data['menu_id'])->get();
        } elseif ($data['value'] == 3) {
            $products = Product::whereBetween('price', [600000, 900000])->Where('menu_id', $data['menu_id'])->get();
        } else {
            $products = Product::whereBetween('price', [900000, 10000000])->Where('menu_id', $data['menu_id'])->get();
        }
        return response()->json(['res' => $products]);
    }
}
