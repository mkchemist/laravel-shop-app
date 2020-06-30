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
    </body>
</html>
