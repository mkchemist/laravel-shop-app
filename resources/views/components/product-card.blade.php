<div class="card px-0 col-lg-3 col-md-5 my-1 product-card">
    <a class="product-img-container text-center" href="">
        @if(isset($product))
            @if ($product->thumb_link && file_exists("images/$product->thumb_link"))
                <img class="img-fluid p-2" src="{{asset("/images$product->thumb_link")}}" alt="" style="max-height:200px"/>
            @else
                <img class="img-fluid p-2" src="{{asset("/images/image-empty.png")}}" alt="" style="max-height:200px"/>
            @endif
        @else
            <img class="img-fluid p-2" src="{{asset("/images/laptop.jpg")}}" alt="" style="max-height:200px"/>
        @endif
	</a>
    <div class="card-body">
        <p class="lead mb-0">{{ $product->name ?? "Product" }}</p>
        <p class="mb-0 text-muted">{{ $product->brand ?? "unkown" }}</p>
        <p class="lead clearfix">
      	    <span class="badge bg-temp-primary text-light float-right">{{ $product->price ?? '1000' }} $</span>
        </p>
        <div class="product-cart-actions">
            <a href="{{ url("/product") }}/{{ $product->id ?? "1" }}">
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
