@extends('customer.home')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/bootstrapUser/images/back2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Giỏ hàng <i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Giỏ hàng</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <form method="post">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>

                                <th>&nbsp;</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sum_price = 0; @endphp
                            @foreach($products as $key => $product)
                            @php
                            $sum_price = $sum_price + (int)($product->price * $carts[$product->id]);
                            @endphp
                            <tr class="alert" role="alert">

                                <td>
                                    <div class="img" style="background-image: url(storage/{{$product->photograph}});"></div>
                                </td>
                                <td>
                                    <div>
                                        <span>{{$product->name}}</span>

                                    </div>
                                </td>

                                <td name="real_price">{{$product->price}}</td>
                                <td>
                                    <div>
                                        <div class=" wrap-num-product flex-w m-l-auto m-r-0">
                                            <input type="number" name="num_product[{{ $product->id }}]" min="1" max="1000" value="{{$carts[$product->id]}}" />
                                        </div>
                                    </div>
                                </td>
                                <td name="total"> {{ number_format($product->price * $carts[$product->id] , 0, '', '.') }}</td>
                                <td>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>{{ number_format($sum_price) }}</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>{{ number_format($sum_price) }}</span>
                                    <input type="hidden" name="total" value="{{$sum_price}}">
                                </p>
                            </div>
                        </div>
                    </div>
                    @php
                    if($carts !=null)
                    {
                    echo '<input type="submit" class="text-center btn btn-primary py-3 px-4" value="Cập nhật giỏ hàng" formaction="/updateCart">
                    <a href="/checkout" class="text-center btn btn-primary py-3 px-4">Tới trang thanh toán</a>';
                    }
                    @endphp
                    @csrf
            </form>

            <!-- <div class="row justify-content-end">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>$20.60</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$3.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>$17.60</span>
                    </p>
                </div>
                <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div> -->
        </div>
</section>
@endsection