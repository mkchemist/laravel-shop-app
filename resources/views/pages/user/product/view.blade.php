@extends("layouts.app")
@section("content")

<div class="row mx-auto container my-2 py-3">
	<div class="col-lg-4">
		<div>
			@if (file_exists("images/$product->thumb_link"))
            <img class="img-fluid p-2 card-top-img" src="{{asset("/images.$product->thumb_link")}}" alt=""/>
            @else
            <img class="img-fluid p-2 card-top-img" src="{{asset('/')}}images/image-empty.png" alt=""/>
            @endif
		</div>
		<hr>
		<div class="row mx-auto d-lg-flex d-none justify-content-between">
			<img src="{{ asset("images/laptop.jpg") }}" alt="product name" class="img-thumbnail col-lg-3 mx-1">
			<img src="{{ asset("images/laptop.jpg") }}" alt="product name" class="img-thumbnail col-lg-3 mx-1">
			<img src="{{ asset("images/laptop.jpg") }}" alt="product name" class="img-thumbnail col-lg-3 mx-1">

		</div>
	</div>
	<div class="col-lg-8 p-2">
		<p class="h2 clearfix mb-0">
            <span>{{ $product->name }}</span>
			<span class="float-right text-primary font-weight-bold">{{ $product->price }} $</span>
        </p>
        <p class="h2 clearfix mb-0">
            <span class="small text-muted">{{ $product->brand }}</span>
            @if($product->sale)
            <del class="float-right text-muted">{{ $product->price + ($product->price * $product->sale) }}$</del>
            @endif
		</p>
		<p>
			{!! $product->desc !!}
		</p>
		<hr>
		<div classs="clearfix">
			<a href="" class="btn btn-lg btn-success float-right">
				<span class="mr-1">
					<i class="fa fa-cart-plus"></i>
				</span>
				<span>add to cart</span>
			</a>
		</div>
	</div>
	<div class="mb-3 col-12">
		<hr>
		<p class="lead mb-0">Similar products of {{ $product->category->name }}</p>
		<div class="owl-carousel  py-3 row mx-auto" id="similer-carousel">
			@foreach($similers as $item)
				<div class="card mx-1 mb-3 text-center">
                    <a href="{{ url("product/$item->id") }}">
                        @if (file_exists("images/$item->thumb_link"))
                        <img class="img-fluid p-2 card-top-img mx-auto" src="{{asset("/images.$item->thumb_link")}}"  alt=""   style="display:block;max-width:60%;height:auto"/>
                        @else
                        <img class="img-fluid p-2 card-top-img" src="{{asset('/')}}images/image-empty.png" alt="" style="width:100%;height:auto;object-fit:cover"/>
                        @endif
                    </a>
                    <div class="card-body">
                        <p class="mb-0">{{ $item->name }}</p>
                        <p class="mb-0 text-primary font-weight-bold">{{ $item->price }} $</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
        $('#similer-carousel').owlCarousel({
            loop: !0,
            items: 4,
            center: !0,
            dots: !0,
            dotsClass: " carousel-dots carousel-dots-primary",
            lazyLoad: !0,
            autoplay: !0,
            autoplayTimeout: 5e3,
            responsive: {
                0 : {
                    items: 1
                },
                575: {
                    items: 3
                },
                992 : {
                    items: 4
                }
            }
        });

	});
</script>

@endsection
