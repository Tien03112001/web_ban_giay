<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'title' => 'Trang Admin'
        ]);
    }
    public function CustomerIndex()
    {
        $products = Product::where('active', 0)->take(8)->get();
        $menus = Menu::where('active', 0)->get();
        return view('customer.main', [
            'title' => 'Trang Chủ',
            'products' => $products,
            'menus' => $menus
        ]);
    }
    public function ProductDetail($id)
    {
        $product = Product::where('id', $id)->first();
        $menus = Menu::where('active', 0)->get();
        return view('customer.productdetail', [
            'title' => 'Trang chi tiết sản phẩm',
            'product' => $product,
            'menus' => $menus
        ]);
    }
    public function ProductList()
    {
        $products = Product::where('active', 0)->get();
        $menus = Menu::where('active', 0)->get();
        return view('customer.productlist', [
            'title' => 'Trang danh sách sản phẩm',
            'products' => $products,
            'menus' => $menus
        ]);
    }
}
