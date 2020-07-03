@extends('layouts.admin')
@section('content')
<div class="p-2">
    <div class="px-0 bg-white">
        <p class="alert alert-primary">
            <span>View {{ $product->name }}</span>
        </p>
        <div class="row mx-auto p-2">
            <div class="col-lg-4">
                @if ($product->thumb_link && file_exists("images$product->thumb_link"))
                <img src="{{ asset("images$product->thumb_link") }}" alt="" class="img-fluid">
                @else
                <img src="{{ asset("images/image-empty.png") }}" alt="" class="img-fluid">
                @endif
            </div>
            <div class="col-lg-8">
                <p class="lead mb-0 font-weight-bold">{{ $product->name }}</p>
                <p class="mb-0 text-muted">{{ $product->brand }}</p>
                <p class="mb-0 text-muted">{{ $product->category->name }}</p>
                <p class="mb-0 text-muted">{{ $product->price }}L.E</p>
                <p class="mb-0 text-muted">{{ $product->sale }}%</p>
                <div class="row mx-auto justify-content-end">
                    <a href="{{ url("/admin/products/$product->id/edit") }}" class="btn btn-sm btn-warning mx-lg-1 my-lg-0 my-1">
                        <i class="fa fa-edit"></i>
                        <span class="ml-1">Edit</span>
                    </a>
                    <form action="{{ url("admin/products/$product->id") }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                            <span class="ml-1">Delete</span>
                        </button>
                    </form>
                </div>
                <hr>
                <p>
                    {!! $product->desc !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
