@extends('layouts.admin')
@section('content')
<div class="p-2">
    <div class="alert alert-warning">
        <p class="mb-0">
            <span><i class="fa fa-edit"></i></span>
            <span class="ml-1">Edit {{ $product->name }}</span>
        </p>
    </div>

    <form action="{{ url("admin/products/$product->id") }}" method="POST" class="row mx-auto p-2 justify-content-between" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        {{-- product name input  --}}
        <div class="col-lg bg-white p-2 rounded mr-lg-1">
            <h4 class="lead p-2">Product details</h4>
            <div class="form-group row mx-auto">
                <div class="col-lg">
                    <span class="form-text text-muted small">Name that will be displayed</span>
                    <input type="text" name="name" id="name" placeholder="Enter product name"  value="{{ $product->name }}" class="form-control {{ $errors->has('name') ? 'border border-danger' : ''}}">
                    @error('name')
                        <span class="text-danger small">must enter product name</span>
                    @enderror
                </div>
            </div>
            {{-- category input and brand input --}}
            <div class="form-group row mx-auto">
                <div class="col-lg">
                    <span class="form-text text-muted small">Category that belonged to</span>
                    <select name="category_id" id="category_id" class="form-control {{ $errors->has('category_id') ? 'border border-danger' : '' }}">
                        <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                        <option value="">--------------------------</option>
                        @foreach($cats as $cat)
                        <option value="{{ $cat->id }}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="small text-danger">must select product category</span>
                    @enderror
                </div>
                <div class="col-lg">
                    <span class="form-text text-muted small">Product brand name</span>
                    <input type="text" name="brand" id="brand" placeholder="Enter product brand"  value="{{ $product->brand }}" class="form-control {{ $errors->has('brand') ? 'border border-danger' : '' }}">
                    @error('brand')
                        <span class="small text-danger">must enter product brand</span>
                    @enderror
                </div>
            </div>
            {{--  price and sale input --}}
            <div class="form-group row mx-auto">
                <div class="col-lg">
                    <span class="form-text text-muted small">Product price</span>
                    <input type="number" name="price" id="price" placeholder="Enter product price" class="form-control {{ $errors->has('price') ? 'border border-danger' : ''}}" value="{{ $product->price }}" min="0">
                    @error('price')
                        <span class="text-danger small">must enter product price</span>
                    @enderror
                </div>
                <div class="col-lg">
                    <span class="form-text text-muted small">Product discount in percentage</span>
                    <input type="number" name="sale" id="sale" placeholder="Enter product sale" class="form-control {{ $errors->has('sale') ? 'border border-danger' : ''}}" value="{{ $product->sale }}" min="0" max="100">
                    @error('sale')
                        <span class="text-danger small">must enter product sale</span>
                    @enderror
                </div>
            </div>
            {{-- product tags input ---}}
            <div class="form-group row mx-auto">
                <div class="col-lg">
                    <span class="form-text text-muted small">tags used to find this product</span>
                    @php
                        $tags = str_replace([']','[','"'],'', $product->tags);
                        $tags = str_replace(',',' ', $tags);
                    @endphp
                    <input type="text" id="tags" placeholder="Enter product tags" class="form-control" value="{{ $tags }}">
                    <input type="text" name="tags" id="product_tags" style="display: none" value="{{ $tags }}">
                </div>
                <div class="col-lg" >
                    <span class="font-weight-bold small">tags :</span>
                    <div id="tags_view"></div>
                </div>
            </div>
            {{-- product description field --}}
            <div class="form-group p-2">
                <span class="form-text text-muted small">write something about this product</span>
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="write product description here..." class="form-control">
                    {!! $product->desc !!}
                </textarea>
            </div>

        </div>
        <div class="col-lg-4 bg-white p-2 rounded">
            <h4 class="lead p-2">Photo</h4>
            @error("thumb_link")
                <ul class="nav text-danger small">
                    @foreach($errors->get("thumb_link") as $item)
                    <li class="nav-item">{{ $item }}</li>
                    @endforeach
                </ul>
            @enderror
            <div class="p-2 text-center" id="product-live-preview">
                @if ($product->thumb_link && file_exists("images$product->thumb_link"))
                <img src="{{ asset("images$product->thumb_link") }}" alt="" class="img-fluid">
                @else
                <img src="{{ asset("images/image-empty.png") }}" alt="" class="img-fluid">
                @endif
            </div>
            <hr>
            <div>
                <button type="button" class="btn btn-dark btn-block" id="upload_btn">
                    upload photo
                </button>
                <input type="file" name="thumb_link" id="thumb_link" style="display: none">
            </div>
        </div>
        <hr>
        <div class="col-12 clearfix bg-white my-2 p-2 rounded">
            <button type="submit" class="btn btn-success float-right">
                <span class="mr-1"><i class="fa fa-save"></i></span>
                <span>Save</span>
            </button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded' , function () {
        var tagsInput = $('#tags');
        var tagsView = $("#tags_view");
        var uploadBtn = $('#upload_btn');
        var thumb = $('#thumb_link');
        var productTags = $("#product_tags");
        var tags = tagsInput.val();
        tags = tags.split(' ');
        tags.forEach(function(tag) {
            tagsView.append(`<span class="bg-light mx-1">#${tag}</span>`);
        });
        tagsInput.on('keyup',function(e) {
            var _val = e.target.value;
            var _len = _val.length;
            if(_val[_len-1] === " ") {
                var tags = _val.split(" ");
                tags.pop();
                tagsView.html('');
                tags.forEach(function(tag) {
                    if(tag !== "") {
                        tagsView.append(`<span class="bg-light mx-1">#${tag}</span>`);
                    }
                })

                productTags.val(JSON.stringify(tags));
            }
        });
        uploadBtn.click(function(e) {
            e.preventDefault();
            thumb.click();
        });
        thumb.change(function(e) {
            var livePreview = $("#product-live-preview");
            var livePreview_class = livePreview.attr('class');
            var file = e.target.files[0];
            if(file === null) {
                console.log("no file selected")
                return;
            }
            if(!FileReader) {
                console.log("this feature not available in this browser");
                return ;
            }
            var reader = new FileReader;
            reader.onload = function(e) {
                livePreview.replaceWith(`
                <div id="product-live-preview" class="${livePreview_class}">
                    <div>
                        <p class="mb-0">uploaded file info.</p>
                        <p class="mb-0 small text-muted">name : <b>${file.name}</b></p>
                        <p class="mb-0 small text-muted">type : <b>${file.type}</b></p>
                        <p class="mb-0 small text-muted">size : <b>${file.size/1000} kb</b></p>
                    </div>
                    <img src="${e.target.result}" class="img-fluid" />
                </div>
                `);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endsection
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace("desc");
    </script>
@endsection
