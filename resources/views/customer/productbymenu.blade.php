@extends('customer.home')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/bootstrapUser/images/back2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Products <i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Products</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Lựa chọn mức giá</h3>
                        <ul class="p-0">
                            <li><a class="price_sidebar" href="#op1" id="op1">Dưới 300.000 Vnđ</a></li>
                            <li><a class="price_sidebar" href="#op2" id="op2">300.000-600.000 Vnđ</a></li>
                            <li><a class="price_sidebar" href="#op3" id="op3">600.000-900.000 Vnđ</a></li>
                            <li><a class="price_sidebar" href="#op4" id="op4">Trên 900.000 Vnd</a></li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Danh mục giày</h3>
                        <ul class="p-0">
                            @foreach ($menus as $menu)
                            <li><a href="/{{$menu->slug}}">{{$menu->name}}<span class="fa fa-chevron-right"></span></a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 d-flex">
                        <div class="product ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(/storage/{{$product->photograph}});">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="/product/{{$product->id}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>

                                        <a href="/product/{{$product->id}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <span class="sale">Sale</span>
                                <span class="category">{{$product->name}}</span>
                                <h2>{{$product->name}}</h2>
                                <p class="mb-0"><span class="price">{{$product->price}}</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <ul>
                                <li><a href="#">&lt;</a></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection