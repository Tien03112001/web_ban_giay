@extends('customer.home')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/bootstrapUser/images/back2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Checkout <i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Checkout</h2>
            </div>
        </div>
    </div>
</section>
<form method="post" action="">
    <section class="ftco-section">
        <div class="container">
            <div class="row">
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

                                <td name="real_price">{{number_format($product->price)}}</td>
                                <td>
                                    <div>
                                        <div class=" wrap-num-product flex-w m-l-auto m-r-0">
                                            <input type="number" name="num_product[{{ $product->id }}]" min="1" max="1000" value="{{$carts[$product->id]}}" disabled />
                                        </div>
                                    </div>

                                </td>
                                <td name="total"> {{ number_format($product->price * $carts[$product->id]) }}</td>
                                <td>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </section>
    <section class="ftco-section">
        <form method="post" action="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 ftco-animate">
                        <h3 class="mb-4 billing-heading">Thông tin đơn hàng</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Họ và tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="note">Chú thích</label>
                                <input type="text" name="note" class="form-control" placeholder="">

                            </div>
                        </div>
                        <!-- END -->
                        <!-- <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
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
                        </div>

                    </div> -->
                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary py-3 px-4">Đặt hàng</button>
                        </div>
                    </div> <!-- .col-md-8 -->
                </div>
            </div>
    </section>
    @csrf
</form>
@endsection