@extends('layouts.app')
@section('content')
    @include("includes.hero-section")
    @include("includes.featured-box")
<div class="my-4">
        <p class="text-center h3">Hot Sale</p>
        <div class="row mx-auto container justify-content-between my-3 px-0">
          @for($i = 0 ; $i < 12 ; $i++)
            <x-product-card />
          @endfor
        </div>
      </div>
      <hr/>
      <div class="my-4">
        <p class="text-center h3">Featured Product</p>
        <div class="row mx-auto container justify-content-between my-3 px-0">
          @for($i = 0 ; $i < 12 ; $i++)
            <x-product-card />
          @endfor
        </div>
      </div>
@endsection
