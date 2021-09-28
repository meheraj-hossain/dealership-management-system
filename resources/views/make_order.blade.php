
<link rel="stylesheet" href="{{asset('assets/make_order/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/style.css')}}">
<?php
Use App\Http\Controllers\InventoryController;
$total =InventoryController::cartItem();
?>
@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-4" style="
    font-size: 20px;
    margin: 2px;
">
        <ol class="breadcrumb float-sm-right">
            <a href="{{route('cart_list')}}">{{$total}}</a>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Product Section Start-->
    <div class="product-section section pt-120 pb-120">
        <div class="container">

            <!-- Product Wrapper Start-->
            <div class="row">



               @foreach($products as $product)
                   <!-- Product Start-->
                       <div class="col-lg-3 col-md-6 col-12 mb-60">

                           <div class="product">

                               <!-- Image Wrapper -->
                               <div class="image">
                                   <!-- Image -->
                                   <a href="product-details.html" class="img"><img src="{{asset($product->image)}}" alt="Product"></a>
                                   <!-- Wishlist -->
                                   <a href="#" class="wishlist"><i class="nav-icon far fa-plus-square"></i></a>
                                   <!-- Label -->
                                   <!-- <span class="label">New</span> -->
                               </div>

                               <!-- Content -->
                               <div class="content">

                                   <!-- Head Content -->
                                   <div class="head fix">

                                       <!-- Title & Category -->
                                       <div class="title-category float-left">
                                           <h5 class="title"><a href="{{route('inventory.show',$product->id)}}">{{$product->name}}</a></h5>
                                           <h5>{{$product->inventory_type}}</h5>
                                       </div>

                                       <!-- Price -->
                                       <div class="price float-right">
                                           <span class="new">{{$product->size}}</span>
                                           <!-- Old Price Mockup If Need -->
                                           <!-- <span class="old">$46</span> -->
                                       </div>
                                   </div>

                                   <div class="head fix">

                                       <div class="title-category float-left">
                                           <h5 style="font-size: 25px;">৳{{$product->price_per_carton}}</h5>

                                       </div>
                                   </div>
                                   <!-- Action Button -->
                                   <div class="action-button fix">
                                       <a href="#">add to cart</a>
                                   </div>

                               </div>

                           </div>

                       </div><!-- Product End-->
               @endforeach

                <!-- Product Start-->

                <!-- Pagination Start -->


            </div><!-- Product Wrapper End-->

        </div>
    </div><!-- Product Section End-->

@endsection

<script src="{{asset('assets/make_order/js/vendor/modernizr-2.8.3.min.js')}}"></script>
<script src="{{asset('assets/make_order/js/main.js')}}"></script>
<script src="{{asset('assets/make_order/js/ajax-mail.js')}}"></script>
<script src="{{asset('assets/make_order/js/plugins.js')}}"></script>
<script src="{{asset('assets/make_order/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/make_order/js/popper.min.js')}}"></script>
<script src="{{asset('assets/make_order/js/vendor/jquery-1.12.0.min.js')}}"></script>
