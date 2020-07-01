@extends("layouts.app")
@section("content")

<div class="row mx-auto container my-2 py-3">
	<div class="col-lg-4">
		<div>
			<img src="{{ asset("images/laptop.jpg") }}" alt="product name" class="img-thumbnail">
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
			<del class="float-right text-muted">{{ $product->price + ($product->price * $product->sale) }}$</del>
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
		<p class="h3 mb-0">Similar products</p>
		<div class="owl-carousel  py-3" id="similer-carousel">
			@for($i = 0 ; $i < 12 ; $i++)
				<div class="card mx-1 mb-3">
					<img class="img-fluid p-2 card-top-img" src="{{asset('/')}}images/laptop.jpg" alt=""/>
					<div class="card-body">
						<p class="lead mb-0">Product name</p>
						<p class="lead mb-0 text-primary font-weight-bold">1000 $</p>
					</div>
				</div>
			@endfor
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		$('#similer-carousel').owlCarousel({
        loop: !0,
        items: 5,
        center: !0,
        dots: !0,
        dotsClass: " carousel-dots carousel-dots-primary",
        lazyLoad: !0,
        autoplay: !0,
        autoplayTimeout: 5e3
    });
	});
</script>

@endsection
