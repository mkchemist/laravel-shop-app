@extends('layouts.app')
@section('content')
    @include("includes.hero-section")
    @include("includes.featured-box")
    @php
     $products = App\Product::all();
    @endphp
    <div class="my-4">
        <p class="text-center h3">Hot Sale</p>
        <div class="row mx-auto container justify-content-between my-3 px-0">
          @foreach ($products as $product)
              <x-product-card :product="$product" />
          @endforeach
        </div>
      </div>
      <hr/>
      <div class="my-4">
        <p class="text-center h3">Featured Product</p>
        <div class="row mx-auto container justify-content-between my-3 px-0">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
      </div>
@endsection
