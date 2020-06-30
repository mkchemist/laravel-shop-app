<header class="bg-temp-primary pb-4">
    <!-- header contacts and social media bar-->
    <div class="row mx-auto" id="website-contacts">
      <!-- left side bar-->
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link text-light" href="">
            <i class="fa fa-envelope"></i
          ></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="">
            <i class="fa fa-phone fa-rotate-90"></i
          ></a>
        </li>
      </ul>
      <!-- right side bar-->
      <ul class="nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="">
            <i class="fab fa-facebook"></i
          ></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="">
            <i class="fab fa-twitter"></i
          ></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="">
            <i class="fab fa-instagram"></i
          ></a>
        </li>
      </ul>
    </div>
    <!-- e-commerce-template navbar-->
    <div class="bg-white" id="navbar-container">
      <!-- large screens navbar-->
      <div
        class="container navbar navbar-expand-lg navbar-light d-lg-flex d-none"
      >
        <a class="navbar-brand" href="{{ url('/') }}">
          <span class="h3 text-temp-primary">{{ env("APP_NAME") }}</span>
        </a>
        <ul class="navbar-nav ml-auto">
          @auth
          <li class="nav-item mx-1">
            <a class="nav-link p-2 landing-effect" href="{{ url("/account") }}"
              ><span><i class="fa fa-user"></i></span
              ><span class="mx-1">Account</span></a
            >
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link p-2 landing-effect" href="{{ url("/logout") }}"
              ><span><i class="fa fa-door-open"></i></span>
              <span class="mx-1">logout</span></a
            >
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link p-2 landing-effect" href="{{ url("/admin") }}"
              ><span><i class="fa fa-user-cog"></i></span>
              <span class="mx-1">Admin Page</span></a
            >
          </li>
          @endauth
          @guest
          <li class="nav-item mx-1">
            <a class="nav-link p-2 landing-effect" href="{{ url("/login") }}"
              ><span><i class="fa fa-sign-in-alt"></i></span
              ><span class="mx-1">Login</span></a
            >
          </li>
          @endguest
          <li class="nav-item mx-1">
            <a
              class="nav-link landing-effect"
              href=""
              data-toggle="modal"
              data-target="#cart-modal"
              ><span class="px-1"
                ><i class="fa fa-shopping-cart"></i
                ><sup class="ml-1 bg-temp-primary cart-counter text-light"
                  >5</sup
                ></span
              ></a
            >
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link landing-effect" href="{{ url("/help") }}"
              ><span class="px-1"><i class="fa fa-question"></i></span
            ></a>
          </li>
        </ul>
      </div>
      <!-- mobile navbar-->
      <div class="container navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand d-lg-none d-block" href="{{ url("/") }}"
          ><span class="h3 text-temp-primary">Easy-Shop</span></a
        >
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item mx-1">
              <a class="nav-link lead text-muted" href="{{ url("/") }}"
                ><span>Home</span></a
              >
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link lead text-muted" href="{{ url("/deals") }}"
                ><span>Best deals</span></a
              >
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link lead text-muted" href=""
                ><span>Categories</span></a
              >
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link lead text-muted" href="{{ url("/offers") }}"
                ><span>Offers</span></a
              >
            </li>
            @auth
            <li class="nav-item mx-1 d-lg-none">
              <a class="nav-link lead text-muted" href="{{ url("/account") }}"
                ><span><i class="fa fa-user"></i></span
                ><span class="mx-1">Account</span></a
              >
            </li>
            <li class="nav-item mx-1 d-lg-none">
              <a class="nav-link lead text-muted" href="{{ url("/logout") }}"
                ><span><i class="fa fa-door-open"></i></span>
                <span class="mx-1">logout</span></a
              >
            </li>
            <li class="nav-item mx-1 d-lg-none">
              <a class="nav-link lead text-muted" href="{{ url("/admin") }}"
                ><span><i class="fa fa-user-cog"></i></span>
                <span class="mx-1">Admin Page</span></a
              >
            </li>
            @endauth
            @guest
            <li class="nav-item mx-1 d-lg-none">
              <a class="nav-link lead text-muted" href="{{ url("/login") }}"
                ><span><i class="fa fa-sign-in-alt"></i></span
                ><span class="mx-1">Login</span></a
              >
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>
    <!--header end
    -->
  </header>
