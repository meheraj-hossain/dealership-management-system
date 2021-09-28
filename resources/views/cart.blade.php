<link rel="stylesheet" href="{{asset('assets/make_order/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('assets/make_order/css/style.css')}}">

@extends('layout.admin.master')

@section('content')

    <!-- Cart Section Start-->
    <div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="table-responsive mb-30">
                        <table class="table cart-table text-center">

                            <!-- Table Head -->
                            <thead>
                            <tr>
                                <th class="number">#</th>
                                <th class="image" >image</th>
                                <th class="name">product name</th>
{{--                                <th class="qty">quantity</th>--}}
                                <th class="price">price</th>
                                <th class="total">totle</th>
                                <th class="remove">remove</th>
                            </tr>
                            </thead>
                            @foreach($inventories as $inventory)
                            <!-- Table Body -->
                            <tbody>
                            <tr>
                                <td><span class="cart-number">1</span></td>
                                <td><a href="#" class="cart-pro-image"><img src="{{asset($inventory->image)}}" alt="" /></a></td>
                                <td><a href="#" class="cart-pro-title">{{$inventory->name}}</a></td>
                                <td><p class="cart-pro-price">{{$inventory->quantity}}</p></td>
                                <td><p class="cart-pro-price">{{$inventory->price_per_carton}}</p></td>
                                <td><p class="cart-price-total">{{$inventory->quantity*$inventory->price_per_carton}}</p></td>
                                <td><a href="actionAddtoCart.php?action=delete&amp;id=1" class=""><ion-icon name="close-circle-outline"></ion-icon>
                                    </a></td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                    <div class="row">

                        <!-- Cart Action -->
                        <div class="cart-action col-lg-4 col-md-6 col-12 mb-30">
                            <a href="#" class="button">Continiue Shopping</a>

                        </div>

                        <!-- Cart Cuppon -->
                        <div class="cart-cuppon col-lg-4 col-md-6 col-12 mb-30">

                        </div>

                        <!-- Cart Checkout Progress -->
                        <div class="cart-checkout-process col-lg-4 col-md-6 col-12 mb-30">
                            <h4 class="title">Process Checkout</h4>
                            <p><span>Subtotal</span><span>$190.98</span></p>
                            <h5><span>Grand total</span><span>$190.98</span></h5>
                            <button class="button">process to checkout</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div><!-- Cart Section End-->

@endsection

<script src="{{asset('assets/make_order/js/vendor/modernizr-2.8.3.min.js')}}"></script>
<script src="{{asset('assets/make_order/js/main.js')}}"></script>
<script src="{{asset('assets/make_order/js/ajax-mail.js')}}"></script>
<script src="{{asset('assets/make_order/js/plugins.js')}}"></script>
<script src="{{asset('assets/make_order/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/make_order/js/popper.min.js')}}"></script>
<script src="{{asset('assets/make_order/js/vendor/jquery-1.12.0.min.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
