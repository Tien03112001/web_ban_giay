@extends('admin.home')
@section('content')
<div class="main-panel">
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
                                    <input type="text" name="name" class="form-control" value="{{$customer->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" value="{{$customer->address}}" disabled>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" value="0{{$customer->phone}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{$customer->email}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="note">Chú thích</label>
                                <input type="text" name="note" class="form-control" placeholder="" value="{{$customer->note}}" disabled>

                            </div>
                        </div>
                        <form method="POST" action="">
                            <div class="row no-print">
                                <div class="col-12">
                                    <select name="status">
                                        <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>Đang chờ
                                        </option>
                                        <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>Đang giao
                                        </option>
                                        <option value="2" {{ $customer->status == 2 ? 'selected' : '' }}>Đã giao
                                        </option>
                                        <option value="3" {{ $customer->status == 3 ? 'selected' : '' }}>Đã hủy
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $customer->id }}">
                            @csrf
                        </form>
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
                            <button type="submit" class="btn btn-primary py-3 px-4">Cập nhật</button>
                        </div>
                    </div> <!-- .col-md-8 -->
                </div>
            </div>
    </section>
</div>
@endsection