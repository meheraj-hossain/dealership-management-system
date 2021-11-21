@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-4" style="
    font-size: 20px;
    margin: 2px;">
        <ol class="breadcrumb float-sm-right">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button><button class="clear-cart btn btn-danger">Clear Cart</button></div>
            </div>
        </ol>
    </div>
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="{{asset($inventory->image)}}" class="product-image" alt="Product Image">
                        </div>
{{--                        <div class="col-12 product-image-thumbs">--}}
{{--                            <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>--}}
{{--                            <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>--}}
{{--                            <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>--}}
{{--                            <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>--}}
{{--                            <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="col-12 col-sm-6" >
                        <h2 class="my-3" >{{$inventory->name}}</h2>
                        <p>{{$inventory->details}}</p>

                        <hr>
                        <h4 style="color: #007BFF">Product Flavor</h4>

                        <div class="form-group">
                            <h5 style="font-style: italic">{{$inventory->BeverageFlavor->name}}</h5>
                        </div>


                        <h4 class="mt-3" style="color: #007BFF"> Product Type </h4>
                        <div class="form-group">
                            <h5 style="font-style: italic">{{$inventory->BeverageType->name}}</h5>
                        </div>

                        <h4 class="mt-3" style="color: #007BFF">Product Size </h4>
                        <div class="form-group">
                            <h5 style="font-style: italic">{{$inventory->BeverageSize->name}}</h5>
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                ৳{{$inventory->price_per_carton}}<h5 >Per Case</h5>
                            </h2>
                            <h4 class="mt-0">
                                <small></small>
                            </h4>
                        </div>

{{--                        <form action="{{route('add_to_cart')}}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="product_id" value="{{$inventory->id}}">--}}
                            <div class="mt-4">

                                <button type="submit" data-name="{{$inventory->id}}" data-product="{{$inventory->name}}" data-flavor="{{$inventory->BeverageFlavor->name}}" data-size="{{$inventory->BeverageSize->name}}" data-price="{{$inventory->price_per_carton}}"  class="add-to-cart btn btn-primary btn-lg btn-flat"> <i class="fas fa-cart-plus fa-lg mr-2"></i> Add To Cart</button>



                            <div class="btn btn-default btn-lg btn-flat">
                                <a href="{{route('order')}}"><i class="fas fa-heart fa-lg mr-2"></i> Continue Order</a>
                            </div>
                        </div>
{{--                        </form>--}}
{{--                        <div class="mt-4 product-share">--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fab fa-facebook-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fab fa-twitter-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fas fa-envelope-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fas fa-rss-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
{{--                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>--}}
{{--                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>--}}
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
{{--                        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>--}}
{{--                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>--}}
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="show-cart table">

                    </table>
                    <div>Total price: $<span class="total-cart"></span></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Order now</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <script type="text/javascript" >

        // ************************************************
        // Shopping Cart API
        // ************************************************

        var shoppingCart = (function() {
            // =============================
            // Private methods and propeties
            // =============================
            cart = [];

            // Constructor
            function Item(name,product,flavor,size,  price, count) {
                this.name = name;
                this.product = product;
                this.flavor = flavor;
                this.price = price;
                this.size = size;
                this.count = count;
            }

            // Save cart
            function saveCart() {
                sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
            }

            // Load cart
            function loadCart() {
                cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
            }
            if (sessionStorage.getItem("shoppingCart") != null) {
                loadCart();
            }


            // =============================
            // Public methods and propeties
            // =============================
            var obj = {};

            // Add to cart
            obj.addItemToCart = function(name,product, flavor,size, price, count) {
                for(var item in cart) {
                    if(cart[item].name === name) {
                        cart[item].count ++;
                        saveCart();
                        return;
                    }
                }
                var item = new Item(name,product, flavor,size, price, count);
                cart.push(item);
                saveCart();
            }
            // Set count from item
            obj.setCountForItem = function(name, count) {
                for(var i in cart) {
                    if (cart[i].name === name) {
                        cart[i].count = count;
                        break;
                    }
                }
            };
            // Remove item from cart
            obj.removeItemFromCart = function(name) {
                for(var item in cart) {
                    if(cart[item].name === name) {
                        cart[item].count --;
                        if(cart[item].count === 0) {
                            cart.splice(item, 1);
                        }
                        break;
                    }
                }
                saveCart();
            }

            // Remove all items from cart
            obj.removeItemFromCartAll = function(name) {
                for(var item in cart) {
                    if(cart[item].name === name) {
                        cart.splice(item, 1);
                        break;
                    }
                }
                saveCart();
            }

            // Clear cart
            obj.clearCart = function() {
                cart = [];
                saveCart();
            }

            // Count cart
            obj.totalCount = function() {
                var totalCount = 0;
                for(var item in cart) {
                    totalCount += cart[item].count;
                }
                return totalCount;
            }

            // Total cart
            obj.totalCart = function() {
                var totalCart = 0;
                for(var item in cart) {
                    totalCart += cart[item].price * cart[item].count;
                }
                return Number(totalCart.toFixed(2));
            }

            // List cart
            obj.listCart = function() {
                var cartCopy = [];
                for(i in cart) {
                    item = cart[i];
                    itemCopy = {};
                    for(p in item) {
                        itemCopy[p] = item[p];

                    }
                    itemCopy.total = Number(item.price * item.count).toFixed(2);
                    cartCopy.push(itemCopy)
                }
                return cartCopy;
            }

            // cart : Array
            // Item : Object/Class
            // addItemToCart : Function
            // removeItemFromCart : Function
            // removeItemFromCartAll : Function
            // clearCart : Function
            // countCart : Function
            // totalCart : Function
            // listCart : Function
            // saveCart : Function
            // loadCart : Function
            return obj;
        })();


        // *****************************************
        // Triggers / Events
        // *****************************************
        // Add item
        $('.add-to-cart').click(function(event) {
            event.preventDefault();
            var name = $(this).data('name');
            var product = $(this).data('product');
            var flavor = $(this).data('flavor');
            var size = $(this).data('size');
            var price = Number($(this).data('price'));
            shoppingCart.addItemToCart(name,product, flavor, size, price, 1);
            displayCart();
        });

        // Clear items
        $('.clear-cart').click(function() {
            shoppingCart.clearCart();
            displayCart();
        });


        function displayCart() {
            var cartArray = shoppingCart.listCart();
            var output = "";
            for(var i in cartArray) {
                output +="<tr>"
                    +"<td>"+"Name"+ "</td>"
                    + "<td>" +"Flavor" + "</td>"
                    + "<td>" +"Size" + "</td>"
                    + "<td>" +"Price" + "</td>"
                    + "<td>" +"Quantity" + "</td>"
                    + "<td>" +"Action" + "</td>"
                    + "<td>" +"Total" + "</td>"
                    +  "</tr>"
                    +"<tr>"
                    + "<td>" + cartArray[i].product + "</td>"
                    + "<td>(" + cartArray[i].flavor + ")</td>"
                    + "<td>(" + cartArray[i].size + ")</td>"
                    + "<td>(" + cartArray[i].price + ")</td>"
                    + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
                    + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
                    + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
                    + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
                    + " = "
                    + "<td>" + cartArray[i].total + "</td>"
                    +  "</tr>";
            }
            $('.show-cart').html(output);
            $('.total-cart').html(shoppingCart.totalCart());
            $('.total-count').html(shoppingCart.totalCount());
        }

        // Delete item button

        $('.show-cart').on("click", ".delete-item", function(event) {
            var name = $(this).data('name')
            shoppingCart.removeItemFromCartAll(name);
            displayCart();
        })


        // -1
        $('.show-cart').on("click", ".minus-item", function(event) {
            var name = $(this).data('name')
            shoppingCart.removeItemFromCart(name);
            displayCart();
        })
        // +1
        $('.show-cart').on("click", ".plus-item", function(event) {
            var name = $(this).data('name')
            shoppingCart.addItemToCart(name);
            displayCart();
        })

        // Item count input
        $('.show-cart').on("change", ".item-count", function(event) {
            var name = $(this).data('name');
            var count = Number($(this).val());
            shoppingCart.setCountForItem(name, count);
            displayCart();
        });

        displayCart();





    </script>
@endpush
