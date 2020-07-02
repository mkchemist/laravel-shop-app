@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset("DataTables/datatables.min.css") }}">
@endsection
@section('content')
<div class="p-2">
    <div class="px-0 bg-white">
        <p class="alert alert-info lead">Product page</p>
        <div class="clearfix p-1">
            <a href="{{ url("admin/products/create") }}" class="btn btn-success btn-sm float-right">
                <span class="mr-1"><i class="fa fa-plus"></i></span>
                <span>add new product</span>
            </a>
        </div>
        <p class="font-weight-bold p-1">Total: {{ count($products) }} items</p>
        <div class="p-1">
            <table class="table table-striped table-responsive-sm small" id="products_table">
                <thead>
                    <tr>
                        <th>Thumb</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Sale</th>
                        <th>Tags</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="text-center">
                            @if ($product->thumb_link && file_exists("images$product->thumb_link"))
                            <img src="{{ asset("images$product->thumb_link") }}" alt="" style="max-width:50px">
                            @else
                            <img src="{{ asset("images/image-empty.png") }}" alt="" style="max-width:50px">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->price }}L.E</td>
                        <td>{{ $product->sale }}%</td>
                        <td>
                            @php
                                $tags = str_replace(['[',']','"'],'',$product->tags);
                                $tags = explode(',',$tags);
                            @endphp
                            <ul>
                                @foreach($tags as $tag)
                                    <li>{{ $tag }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="row mx-auto">
                            <a href="{{ url("/admin/products/$product->id/edit") }}" class="btn btn-sm btn-warning mx-lg-1 my-lg-0 my-1">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>

    $(document).ready(function() {
        $('#products_table').DataTable({
            select: true
        })
    })
    </script>
@endsection
