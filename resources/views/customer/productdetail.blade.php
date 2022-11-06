@extends('customer.home')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/bootstrapUser/images/back2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="product.html">Products <i class="fa fa-chevron-right"></i></a></span> <span>Products Single <i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Products Single</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <form method="post" action="/addtocart">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="/storage/{{$product->photograph}}" class="image-popup prod-img-bg"><img src="/storage/{{$product->photograph}}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <h3>{{$product->name}}</h3>
                    <p class="price"><span>{{$product->price}}</span> VND</p>
                    <p>{{$product->description}}</p>
                    <div class="row mt-4">
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <!-- <div class="col-md-12">
                        <p style="color: #000;">80 piece available</p>
                    </div> -->
                    </div>
                    <p><button type="submit" class="btn btn-primary py-3 px-5 mr-2">Add to Cart</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
                        <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">

                    <div class="tab-content bg-light" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="p-4">

                                <h3 class="mb-4">{{$product->name}}</h3>
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                            <div class="row p-4">
                                <div class="col-md-7">
                                    <h3 class="mb-4">23 Reviews</h3>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(/bootstrapUser/images/avatarUser.jpg)"></div>
                                        <div class="desc">
                                            <form>
                                                <input type="hidden" id="product_id" value="{{$product->id}}">
                                                @php
                                                if(isset(Auth::user()->id))
                                                {
                                                $name= Auth::user()->name;
                                                echo '<h4>';
                                                    echo '<span class="text-left">'.$name.'</span>';
                                                    echo '<textarea id="comment" cols="5" rows="3" class="form-control"></textarea>';
                                                    echo '';
                                                    echo '</h4>';
                                                echo '<button type="button" id="btn-comment" class="btn btn-primary py-3 px-5 mr-2">Gửi bình luận</button>';
                                                }
                                                else
                                                {
                                                echo '<div class="reg">';
                                                    echo '<p class="mb-0"><a href="../admin/user/login">Đăng nhập</a> để gửi bình luận sản phẩm</p>';
                                                    echo '</div>';
                                                }
                                                @endphp


                                            </form>

                                        </div>
                                    </div>
                                    @include('customer.listComment')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>
</section>


@endsection