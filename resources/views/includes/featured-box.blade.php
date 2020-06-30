<!-- featured product box start-->
  <div class="featured-box container">
    <!-- featured box nav-->
    <ul class="featured-nav">
      <li class="featured-nav-item active">
        <a class="featured-nav-link font-weight-bold" href="" data-index="0">Sale</a>
      </li>
      <li class="featured-nav-item">
       <a class="featured-nav-link font-weight-bold" href="" data-index="1">New</a>
      </li>
      <li class="featured-nav-item">
       <a class="featured-nav-link font-weight-bold" href="" data-index="2">Popular</a>
      </li>
    </ul>
    <div class="featured-items-container">
      <!-- featured box item-->
      <div class="featured-item">
        @for($i=0 ; $i < 3 ; $i++)
          <x-product-card />
        @endfor
      </div>
      <!-- featured box item-->
      <div class="featured-item">
        @for($i=0 ; $i < 4 ; $i++)
          <x-product-card />
        @endfor
      </div>
      <!-- featured box item-->
      <div class="featured-item">
        @for($i=0 ; $i < 6 ; $i++)
          <x-product-card />
        @endfor
      </div>
    </div>
  </div>
  <!-- featured product box end-->