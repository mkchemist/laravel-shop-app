@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset("DataTables/datatables.min.css") }}">
@endsection
@section('content')
<div class="p-2">
    <div class="px-0 bg-white">
        <p class="alert alert-danger lead">
            <span class="mr-1"><i class="fa fa-trash"></i></span>
            <span>View all trashed products</span>
        </p>
        <hr>
        <div class="p-2">
            <table class="table small table-striped table-responsive-sm" id="trashed_products">
                <thead>
                    <tr>
                        <th>Thumb</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Sale</th>
                        <th>Tags</th>
                        <th>Deleted at</th>
                        <th>Actions</th>
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
                            <td>{{ $product->deleted_at }}</td>
                            <td class="row mx-auto">
                                <a href="{{ url("admin/products/$product->id/edit") }}" class="btn btn-warning btn-sm mx-1">
                                    <span><i class="fa fa-edit"></i></span>
                                </a>
                                <form action="{{ url("admin/products/restore/$product->id") }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm">
                                        <span><i class="fa fa-redo"></i></span>
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
    <script src="{{ asset("DataTables/datatables.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('#trashed_products').DataTable({
                select: true
            });
        });
    </script>
@endsection
