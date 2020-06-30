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
		<p class="h2 clearfix">
			<span>Product Name</span>
			<span class="float-right text-primary font-weight-bold">1000 $</span>
			<br>
			<del class="float-right text-muted">1200 $</del>

		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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