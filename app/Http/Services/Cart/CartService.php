<?php

namespace App\Http\Services\Cart;

use App\Models\Bill;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('quantity');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {

            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;
    }
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'photograph', 'quantity')
            ->where('active', 0)
            ->whereIn('id', $productId)
            ->get();
    }
    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));

        return true;
    }
    public function complete_customer($request)
    {
        $data = $request->input();
        Customer::create([
            'name' => (string) $data['name'],
            'address' => (string) $data['address'],
            'phone' => (string) $data['phone'],
            'email' => (string) $data['email'],
            'note' => (string) $data['note'],
            'status' => (int) 0,
        ]);
        return true;
    }
    public function complete_bill($carts)
    {
        $customer = Customer::orderbyDESC('id')->first();
        $carts = Session::get('carts');
        $products = $this->getProduct();
        foreach ($products as $product) {
            Bill::create([
                'customer_id' => (string) $customer['id'],
                'product_id' => (string) $product->id,
                'quantity' => (int) $carts[$product->id],
            ]);
            $qtyNew = (int)$product->quantity - (int)$carts[$product->id];
            $product->update(['quantity' => $qtyNew]);
        }
        return true;
    }
}
