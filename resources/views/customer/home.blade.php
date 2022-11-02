<!DOCTYPE html>
<html lang="en">

@include('customer.head')

<body>

    <div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <p class="mb-0 phone pl-md-2">
                        <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 034.381.2647</a>
                        <a href="#"><span class="fa fa-paper-plane mr-1"></span> vucongtien031101@gmail.com</a>
                    </p>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    @php

                    if(isset(Auth::user()->id))
                    {
                    $name= Auth::user()->name;
                    echo '<div class="reg">';
                        echo '<p class="mb-0"><a href="#" class="mr-2">Hello '.$name.'</a></p>';
                        echo '</div>';
                    }

                    else{
                    echo '<div class="reg">';
                        echo '<p class="mb-0"><a href="#" class="mr-2">Đăng ký </a> <a href="#">Đăng nhập</a></p>';
                        echo '</div>';
                    }
                    @endphp
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{route('HomeCustomer')}}">39Tominay <span>store</span></a>
            <div class="order-lg-last btn-group">
                <a href="{{route('cart')}}" class="btn-cart dropdown-toggle dropdown-toggle-split">
                    <span class="flaticon-shopping-bag"></span>
                    <div class="d-flex justify-content-center align-items-center"><small>
                            @php
                            if(\Illuminate\Support\Facades\Session::get('carts')==null)
                            {
                            echo 0;
                            }
                            else
                            echo count(\Illuminate\Support\Facades\Session::get('carts'));
                            @endphp
                        </small>
                    </div>
                </a>

            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.html" class="nav-link">Sản phẩm</a></li>
                    @foreach($menus as $menu)
                    <li class="nav-item"><a href="/menu/{{$menu->slug}}" class="nav-link">{{$menu->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')

    @include('customer.footer')

</body>

</html>