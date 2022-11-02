<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Menu;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::orderbyDESC('id')->paginate(20);
    }
    public function getAll()
    {
        return Product::orderbyDESC('id')->paginate(20);
    }
    public function create($request)
    {
        if (
            (string)$request->input('name') == ''
            && (int)$request->input('price') > 0
            && (int)$request->input('quantity') > 0
            && (string)$request->input('description') == ''
            && (string)$request->input('content') == ''

        ) {
            return false;
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->menu_id = $request->input('menu_id');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        if ($request->hasfile('photograph')) {
            $file = $request->file('photograph');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;

            $file->move('storage', $filename);
            $product->photograph = $filename;
        }
        $product->active = $request->input('active');
        $product->save();
        return true;
    }
    public function update($product, $request)
    {
        if (
            (string)$request->input('name') == ''
            && (int)$request->input('price') > 0
            && (int)$request->input('quantity') > 0
            && (string)$request->input('description') == ''
            && (string)$request->input('content') == ''
        ) {
            return false;
        }
        $product->name = $request->input('name');
        $product->menu_id = $request->input('menu_id');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        if ($request->hasfile('photograph')) {
            $file = $request->file('photograph');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;

            $file->move('storage', $filename);
            $product->photograph = $filename;
        }
        $product->active = $request->input('active');
        $product->save();
        return true;
    }
    public function filter_price_product_service($request)
    {
        $products = Product::whereBetween('price', [0, 500000])->get();
        $output = '';
        foreach ($products as $product) {
            $output .= '<div class="col-md-4 d-flex">
                        <div class="product ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(/storage/' . $product->photograph . ');">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="/product/' . $product->id . '" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>

                                        <a href="/product/' . $product->id . '" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <span class="sale">Sale</span>
                                <span class="category">' . $product->name . '</span>
                                <h2>' . $product->name . '</h2>
                                <p class="mb-0"><span class="price">' . $product->price . '</span></p>
                            </div>
                        </div>';
        }
        echo $output;
    }
}
