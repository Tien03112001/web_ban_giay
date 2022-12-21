<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        $customers = Customer::orderbyDESC('id')->get();//lấy ra tất cả các đơn hàng
        return view('admin.order.list', [
            'title' => 'Trang đơn hàng',
            'customers' => $customers,
        ]);
        // trả về view quản lý đơn hàng
    }
    public function edit($id)
    {
        $bill = Bill::where('customer_id', $id)->get();// trả về bill theo id 
        $customer = Customer::where('id', $id)->first();// trả về đơn hàng theo id
        return view('admin.order.edit', [
            'title' => 'Trang chi tiết đơn hàng',
            'customer' => $customer,
        ]);
    }
    public function update($id, Request $request)
    {
        $customer = Customer::where('id', $id)->first();// lấy ra đơn hàng cần update
        $customer->status = (int)$request->input('status');// cập  nhật status theo dữ liệu request được gửi lên 
        $customer->save();// lưu đơn hàng được sửa đổi 
        toastr()->success('Cập nhật trạng thái đơn thành công');
        return Redirect('/admin/order/list');
    }
}
