<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Cart\CartService;
use App\Jobs\SendMail;
use App\Models\Customer;
use App\Models\Menu;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        $products = $this->cartService->getProduct();
        $menus = Menu::orderbyDESC('id')->paginate(20);
        return view('customer.cart', [
            'title' => 'Giỏ hàng',
            'menus' => $menus,
            'products' => $products,
            'carts' => Session::get('carts'),
        ]);
    }
    public function create(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result) {
            toastr()->success('Thêm vào giỏ hàng thành công');
            return redirect()->back();
        } else {
            toastr()->error('Lỗi , hàng đang hết');
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $result = $this->cartService->update($request);
        if ($result) {
            toastr()->success('Cập nhật giỏ hàng thành công');
            return redirect('/cart');
        } else {
            toastr()->error('Lỗi , xin mời nhập lại');
            return redirect()->back();
        }
    }
    public function checkout()
    {
        $products = $this->cartService->getProduct();
        $menus = Menu::orderbyDESC('id')->paginate(20);
        return view('customer.checkout', [
            'title' => 'Thanh toán',
            'menus' => $menus,
            'products' => $products,
            'carts' => Session::get('carts'),
        ]);
    }
    public function complete_checkout(Request $request)
    {
        $products = $this->cartService->getProduct();
        $carts = Session::get('carts');
        $result = $this->cartService->complete_customer($request);
        if ($result) {
            $result1 = $this->cartService->complete_bill($carts);
            if ($result1) {
                toastr()->success('Đặt hàng thành công');
                // SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
                Session::forget('carts');
                return redirect('/cart');
            }
        }
    }
}
