<div class="card px-0 col-lg-3 col-md-5 mx-1 my-1 product-card">
	<a class="product-img-container" href="">
		<img class="img-fluid p-2" src="{{asset('/')}}images/laptop.jpg" alt=""/>
	</a>
    <div class="card-body">
      <p class="lead clearfix">
      	<span>{{ isset($product) && isset($product->name) ? $product->name : 'Product Name' }}</span>
      	<span class="badge bg-temp-primary text-light float-right">{{ $product->price ?? '1000' }} $</span>
      </p>
      <div class="product-cart-actions">
      	<a href="{{ url("/product/1") }}">
      		<i class="fa fa-eye"></i>
      	</a>
      	<a href="">
      		<i class="fa fa-cart-plus"></i>
      	</a>
      	<a href="">
      		<i class="fa fa-star"></i>
      	</a>
      </div>
    </div>
</div>
