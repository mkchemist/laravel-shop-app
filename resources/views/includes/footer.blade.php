 <!-- footer start-->
 <div class="row mx-auto bg-temp-primary p-2">
    <div class="col-lg-3 p-2">
    <p class="display-4 text-light">{{ env("APP_NAME") }}</p>
    <p class="text-light small">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum illo
        quos unde non aliquid natus vel officiis sint. Repellendus sint
        dolorum ex quod maxime eum dicta doloribus, veritatis cumque pariatur.
    </p>
    </div>
    <div class="col-lg-3 p-2">
    <h4 class="text-light">Useful Links</h4>
    <ul class="nav">
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">home</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">best deals</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">categories</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">about</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href=""
            >terms and conditions</a
        >
        </li>
    </ul>
    </div>
    <div class="col-lg-3 p-2">
    <h4 class="text-light">Links</h4>
    <ul class="nav">
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">Link</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">Link</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">Link</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">Link</a>
        </li>
        <li class="nav-item col-lg-12">
        <a class="nav-link text-light small" href="">Link</a>
        </li>
    </ul>
    </div>
    <div class="col-lg-3 p-2 text-light">
        <h4>NewsLetter</h4>
        <p>subscribe to our newsletter</p>
        <form action="" id="newsletter_form">
            <input
            class="form-control"
            id="newsletter_email"
            type="text"
            name="newsletter_email"
            placeholder="Enter email"
            />
            <button class="btn btn-dark btn-block my-2" type="submit">
            <span>subscribe</span>
            </button>
        </form>
    </div>
</div>
<!--footer end-->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#newsletter_form').submit(function(e) {
            e.preventDefault();
            console.log("New E-mail added to newsletter")
        });
    })

</script>
