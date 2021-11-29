@extends('layout.admin.master')
@push('css')
    <style>
        x, .alert-container {
            font-family: helvetica, arial;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }
        x, .alert-container {
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            -ms-border-radius: 4px;
            border-radius: 4px;
        }
        x, .alert-container {
            background-color: #5f7c8a;
            color: #f8f8f8;
            border: 1px solid #516a76;
        }
        x {
            margin: 20px 20px;
        }
        .alert-container {
            position: fixed;
            bottom: 5px;
            left: 2%;
            width: 50%;
            margin: 0 25% 0 25%;
        }
        .alert-container .alert {
            text-align: center;
            padding: 17px 0 20px 0;
            margin: 0 25% 0 25%;
            height: 54px;
            font-size: 20px;
        }
    </style>
@endpush
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button><button class="clear-cart btn btn-danger">Clear Cart</button>
        </ol>
    </div>
@endsection
@section('content')

    <div class=" col-md-2" style="float: left">
        <h4>Beverage Search</h4>
        <form action="">
            <h5>Categories</h5>
            <div class="form-group">
                @foreach($categories as $category)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$category->name}}" type="checkbox" id="{{$category->name}}" value="10{{$category->id}}">
                        <label for="Categories" class="">{{$category->name}}</label>
                    </div>
                @endforeach


            </div>
        </form>

        <h5>Sizes</h5>
        <form action="">
            <div class="form-group">
                @foreach($sizes as $size)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$size->name}}" type="checkbox" id="{{$size->name}}" value="20{{$size->id}}">
                        <label for="Categories" class="">{{$size->name}}</label>
                    </div>
                @endforeach

            </div>
        </form>

        <h5>Flavors</h5>
        <form action="">
            <div class="form-group">
                @foreach($flavors as $flavor)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$flavor->name}}" type="checkbox" id="{{$flavor->name}}" value="30{{$flavor->id}}">
                        <label for="Categories" class="">{{$flavor->name}}</label>
                    </div>
                @endforeach

            </div>
        </form>

        <h5>Types</h5>
        <form action="">
            <div class="form-group">
                @foreach($types as $flavor)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$flavor->name}}" type="checkbox" id="{{$flavor->name}}" value="40{{$flavor->id}}">
                        <label for="Categories" class="">{{$flavor->name}}</label>
                    </div>
                @endforeach

            </div>
        </form>
    </div>


    <div class=" col-md-2" style="float: left" >
        <h4>Snacks Search</h4>
        <form action="">
            <h5>Snacks Categories</h5>
            <div class="form-group">
                @foreach($scategories as $category)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$category->name}}" type="checkbox" id="{{$category->name}}" value="10{{'1'.$category->id}}">
                        <label for="Categories" class="">{{$category->name}}</label>
                    </div>
                @endforeach


            </div>
        </form>

        <h5>Sizes</h5>
        <form action="">
            <div class="form-group">
                @foreach($ssizes as $size)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$size->name}}" type="checkbox" id="{{$size->name}}" value="20{{'2'.$size->id}}">
                        <label for="Categories" class="">{{$size->name}}</label>
                    </div>
                @endforeach

            </div>
        </form>

        <h5>Flavors</h5>
        <form action="">
            <div class="form-group">
                @foreach($sflavors as $flavor)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$flavor->name}}" type="checkbox" id="{{$flavor->name}}" value="30{{'3'.$flavor->id}}">
                        <label for="Categories" class="">{{$flavor->name}}</label>
                    </div>
                @endforeach

            </div>
        </form>

        <h5>Types</h5>
        <form action="">
            <div class="form-group">
                @foreach($stypes as $flavor)
                    <div class="custom-control custom-checkbox">
                        <input class="" name="{{$flavor->name}}" type="checkbox" id="{{$flavor->name}}" value="40{{'4'.$flavor->id}}">
                        <label for="Categories" class="">{{$flavor->name}}</label>
                    </div>
                @endforeach

            </div>
        </form>


    </div>


    <!-- Main -->
    <div class="container col-md-8 " id="container" >
        <div class="row ">
            @foreach($products as $product)
                <div class="col" data-category="10{{($product->inventory_type=='Beverages')?$product->BeverageCategory->id:'1'.$product->SnacksCategory->id}} 20{{($product->inventory_type=='Beverages')?$product->BeverageSize->id:'2'.$product->SnacksSize->id}} 30{{($product->inventory_type=='Beverages')?$product->BeverageFlavor->id:'3'.$product->SnacksFlavor->id}} 40{{($product->inventory_type=='Beverages')?$product->BeverageType->id:'4'.$product->SnacksType->id}}" >
                    <div class="card " id="card" style="width: 20rem;">
                        <img class="card-img-top" src="{{asset($product->image)}}" alt="Card image cap">
                        <div class="card-block"><a href="">
                                <h4 class="card-title col-md-12" style="text-align: center; font-size: 20px;font-style:italic;font-family: Times New Roman, Times, serif;"><b>{{$product->name}}</b></h4></a>
                            {{--                    <h4 class="card-text ">{{$product->category}}</h4>--}}
                            {{--                    <h4 class="card-title ">{{$product->size}}</h4>--}}
                            <p class="card-text" style="text-align: center;    font-weight: 600"><b>Category-{{($product->inventory_type=='Beverages')?$product->BeverageCategory->name:$product->SnacksCategory->name}} </b></p>
                            <p class="card-text" style="text-align: center;    font-weight: 500;margin-top: -15px"><b>Size-{{($product->inventory_type=='Beverages')?$product->BeverageSize->name:$product->SnacksSize->name}}</b></p>
                            <p class="card-text" style="text-align: center;    font-weight: 500;margin-top: -15px"><b>Type-{{($product->inventory_type=='Beverages')?$product->BeverageType->name:$product->SnacksType->name}}</b></p>
                            <p class="card-text" style="text-align: center;    font-weight: 500;margin-top: -15px"><b>Flavor-{{($product->inventory_type=='Beverages')?$product->BeverageFlavor->name:$product->SnacksFlavor->name}}</b></p>
                            <p class="card-text" style="text-align: center;margin-top: -15px;color:red " ><b>৳{{$product->price_per_carton}}</b></p>
                        </div>
                        <a href="{{route('inventory.show',$product->id)}}" class="product__viewBtn" style="margin-left: 80px">view details</a>
                    </div>
                    <x href="#" data-name="{{$product->id}}" data-product="{{$product->name}}"  data-price="{{$product->price_per_carton}}" data-flavor="{{($product->inventory_type=='Beverages')?$product->BeverageFlavor->name:$product->SnacksFlavor->name}}" data-size="{{($product->inventory_type=='Beverages')?$product->BeverageSize->name:$product->SnacksSize->name}}" data-type="{{($product->inventory_type=='Beverages')?$product->BeverageType->name:$product->SnacksType->name}}"  class="add-to-cart btn btn-primary" style=" margin-bottom: 15px; margin-top:-10px; margin-left: 105px;">Add to cart</x>
                </div>
            @endforeach


        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('place.order')}}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <table class="show-cart table">

                        </table>
                        <div>Total price: ৳<span class="total-cart"></span></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class=" btn btn-primary"onclick="deleteItems()">Order Now</button>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="alert-container">
        <div class="alert">
            Product has been added to list.
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
            function Item(name,product,flavor,size,type, price, count) {
                this.name = name;
                this.product = product;
                this.flavor = flavor;
                this.price = price;
                this.size = size;
                this.type = type;
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
            obj.addItemToCart = function(name,product, flavor,size,type, price, count) {
                for(var item in cart) {
                    if(cart[item].name === name) {
                        cart[item].count ++;
                        saveCart();
                        return;
                    }
                }
                var item = new Item(name,product, flavor,size,type, price, count);
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
            var type = $(this).data('type');
            var price = Number($(this).data('price'));
            shoppingCart.addItemToCart(name,product, flavor, size,type, price, 1);
            displayCart();
        });

        // Clear items
        $('.clear-cart').click(function() {
            shoppingCart.clearCart();
            displayCart();
        });


        function displayCart() {
            var cartArray = shoppingCart.listCart();
            var output = "<tr>"
                +"<td>"+"Name"+ "</td>"
                + "<td>" +"Flavor" + "</td>"
                + "<td>" +"Size" + "</td>"
                + "<td>" +"Type" + "</td>"
                + "<td>" +"Price" + "</td>"
                + "<td>" +"Quantity" + "</td>"
                + "<td>" +"Action" + "</td>"
                + "<td>" +"Total" + "</td>"
                +  "</tr>";
            for(var i in cartArray) {
                output +=
                    `<tr>
                    <input type="hidden" value="${cartArray[i].name}" name="id[]">
                    <td id="name">${cartArray[i].product}</td>
                    <td id="flavor">${cartArray[i].flavor}</td>
                    <td id="size">${cartArray[i].size}</td>
                    <td id="size">${cartArray[i].type}</td>
                    <td id="price">${cartArray[i].price}</td>
                    <td><div class="input-group"><button class="minus-item input-group-addon btn btn-primary" data-name="${cartArray[i].name}">-</button>
                    <input type="number" class="item-count form-control" data-name="${cartArray[i].name}" value="${cartArray[i].count }" name="quantity[${cartArray[i].name}]">
                    <button class="plus-item btn btn-primary input-group-addon" data-name="${cartArray[i].name}">+</button>
                    </div></td>
                    <td><button class="delete-item btn btn-danger" data-name="${cartArray[i].name}">X</button></td>
                    <td id="total">${cartArray[i].total}</td>
                    </tr>
                    `;
                // +"<tr>"
                // +"<input type='hidden' value=''>"
                // + "<td>" + cartArray[i].product + "</td>"
                // + "<td>(" + cartArray[i].flavor + ")</td>"
                // + "<td>(" + cartArray[i].size + ")</td>"
                // + "<td>(" + cartArray[i].price + ")</td>"
                // + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
                // + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
                // + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
                // + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
                //
                // + "<td>" + cartArray[i].total + "</td>"
                // +  "</tr>";
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
        function deleteItems(){
            sessionStorage.clear();
        }

        displayCart();





    </script>
    <script>
        var $filterCheckboxes = $('input[type="checkbox"]');
        var filterFunc = function() {

            var selectedFilters = {};

            $filterCheckboxes.filter(':checked').each(function() {

                if (!selectedFilters.hasOwnProperty(this.name)) {
                    selectedFilters[this.name] = [];
                }

                selectedFilters[this.name].push(this.value);
            });

            // create a collection containing all of the filterable elements
            var $filteredResults = $('.col');

            // loop over the selected filter name -> (array) values pairs
            $.each(selectedFilters, function(name, filterValues) {

                // filter each .col element
                $filteredResults = $filteredResults.filter(function() {

                    var matched = false,
                        currentFilterValues = $(this).data('category').split(' ');

                    // loop over each category value in the current .col's data-category
                    $.each(currentFilterValues, function(_, currentFilterValue) {

                        // if the current category exists in the selected filters array
                        // set matched to true, and stop looping. as we're ORing in each
                        // set of filters, we only need to match once

                        if ($.inArray(currentFilterValue, filterValues) != -1) {
                            matched = true;
                            return false;
                        }
                    });

                    // if matched is true the current .col element is returned
                    return matched;

                });
            });

            $('.col').hide().filter($filteredResults).show();
        }

        $filterCheckboxes.on('change', filterFunc);
    </script>
    <script>
        $(function() {
            var alert = $(".alert-container");

            alert.hide();

            $("x").click(function(e) {
                e.preventDefault();
                alert.slideDown();
                window.setTimeout(function() {
                    alert.slideUp();
                }, 2500);
            });
        });
    </script>
@endpush
