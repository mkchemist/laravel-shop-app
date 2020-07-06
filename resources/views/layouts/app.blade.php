<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset("fontawesome/css/all.min.css")}}"  />
    <!-- Owl Carousel CSS-->
    <link rel="stylesheet" href="{{asset("owl.carousel/css/owl.carousel.min.css")}}" />
    <!-- Owl Carousel Theme CSS-->
    <link rel="stylesheet" href="{{asset("owl.carousel/css/owl.theme.default.min.css")}}" />
    <!-- E-Commerce Template CSS-->
    <link rel="stylesheet" href="{{asset("css/e-commerce-template.css")}}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/notification.css') }}">
    <title>Easy-Shop</title>
  </head>
  <body>
        @include("includes.navbar")
        <div class="bg-white" style="min-height: 600px;">
            @yield('content')
        </div>
        @include("includes.cart-modal")
        @include("includes.footer")
        @include("includes.alert-bar")
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Owl Carousel script-->
        <script src="{{asset("owl.carousel/js/owl.carousel.min.js")}}"></script>
        <!--E-Commerce Template script-->
        <script src="{{asset("js/e-commerce-template.js")}}"></script>
        <script>
             var cart_name = "shopping-cart";
                var img_url = "{{ url('/images') }}";
                var add_cart_btns = document.querySelectorAll('[data-cart]');
                var search_cart_input = document.getElementById("cart_search");
                function getShoppingCart() {
                    var _c = localStorage.getItem(cart_name);
                    if(_c) {
                        return JSON.parse(_c);
                    } else {
                        return [];
                    }
                }
                function updateCart(store) {
                    localStorage.setItem(cart_name, JSON.stringify(store));
                }
                function addTocart(product) {
                    var _c = getShoppingCart();
                    _c.push(product);
                    updateCart(_c);
                }
                function removeFromCart(i) {
                    var _c = getShoppingCart();
                    _c.splice(i, 1);
                    updateCart(_c);
                    renderCart(_c);
                }
                function renderCart(store) {
                    var _c = store;
                    console.log(_c)
                    var _l = _c.length;
                    var counter = document.querySelector('#cart-counter');
                    var cart_output = document.querySelector('#cart_output');
                    counter.innerHTML = _l;
                    cart_output.innerHTML = "";
                    if(!_l) {
                        cart_output.innerHTML = `
                            <p class="lead text-center my-1">No items in cart</p>
                        `;
                        return;
                    }
                    _c.forEach(function(item,i) {
                        cart_output.innerHTML += `
                            <div class="row mx-auto border-bottom my-1 pb-2">
                                <div class="col-3">
                                    <img src="${img_url+item.thumb_link}" alt="${item.name+' photo'}" class="img-fluid" />
                                </div>
                                <div class="col-9">
                                    <span class="">${item.name}<span>
                                    <br>
                                    <span class="text-muted">${item.brand}<span>
                                    <br>
                                    <span class="clearfix"><span class="">${item.price} L.E</span></span>
                                    <div>
                                        <button class="btn btn-sm btn-danger" onclick="removeFromCart(${i})">remove</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                }
                add_cart_btns.forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        var _p = btn.dataset.cart;
                        _p = JSON.parse(_p);
                        addTocart(_p);
                        renderCart(getShoppingCart());
                    });
                });

                search_cart_input.addEventListener('keyup', function(e) {
                    var _v = e.target.value;
                    var _c = getShoppingCart();
                    var _r = [];
                    if(_v === '' || _v === " ") {

                    }
                    _c.forEach(function(item) {
                        if(item.name.toLowerCase().includes(_v)) {
                            _r.push(item);
                        }
                    });

                    renderCart(_r);
                });
                renderCart(getShoppingCart());
        </script>
    </body>
</html>
