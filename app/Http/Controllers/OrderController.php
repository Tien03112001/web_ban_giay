<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        $customers = Customer::orderbyDESC('id')->get();
        return view('admin.order.list', [
            'title' => 'Trang đơn hàng',
            'customers' => $customers,
        ]);
    }
    public function edit($id)
    {
        $bill = Bill::where('customer_id', $id)->get();
        $customer = Customer::where('id', $id)->first();
        return view('admin.order.edit', [
            'title' => 'Trang chi tiết đơn hàng',
            'customer' => $customer,
        ]);
    }
    public function update($id, Request $request)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->status = (int)$request->input('status');
        $customer->save();
        toastr()->success('Cập nhật trạng thái đơn thành công');
        return Redirect('/admin/order/list');
    }
}
