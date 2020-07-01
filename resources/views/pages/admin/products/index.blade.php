@extends('layouts.admin')
@section('content')
<div class="p-2">
    <div class="alert alert-info">
        <p class="mb-0">
            <span><i class="fa fa-eye"></i></span>
            <span>View All Products</span>
        </p>
    </div>
    @if(count($products) > 0)
        @foreach ($products as $product)
            <div class="card">
                <div class="card-body">
                    <div class="row mx-auto">
                        <div class="col-lg-4">
                            @if(file_exists("images/$product->thumb_link"))
                                <img src="{{ asset("/images/$product->thumb_link") }}" alt="" class="img-fluid">
                            @else
                                <img src="{{ asset("images/image-empty.png") }}" alt="" class="img-fluid">
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <p>{{ $product->name }}</p>
                            <p class="small text-muted">{!! $product->desc !!}</p>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    @else
    <div>
        <p class="display-4 text-center my-2">No items added</p>
        <div class="text-center">
            <a href="{{ url("admin/products/create") }}">
                <span class="mr-1"><i class="fa fa-plus"></i></span>
                <span>Add new Product</span>
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
