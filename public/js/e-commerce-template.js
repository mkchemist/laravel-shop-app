var _links = $(".toggleEdit");

function FeaturedBox(e) {
    this.root = e, this.links = $(e + " .featured-nav-link"), this.items = $(e + " .featured-item"), 
    this.init = function() {
        this.markLinkAsActive(), this.showActiveItem();
        var s = this;
        this.links.each(function(e, t) {
            var i = $(t).data("index");
            $(t).click(function(e) {
                e.preventDefault(), s.markLinkAsActive(i), s.showActiveItem(i);
            });
        });
    }, this.markLinkAsActive = function(i) {
        i = i || 0, this.links.each(function(e, t) {
            $(t).parent().removeClass("active"), e === i && $(t).parent().addClass("active");
        });
    }, this.showActiveItem = function(i) {
        i = i || 0, this.items.each(function(e, t) {
            $(t).hide(), e === i && ($(t).show(), $(t).addClass("fade-effect-enter"));
        });
    };
}

$(document).ready(function() {
    $(".hero-section").owlCarousel({
        loop: !0,
        items: 1,
        center: !0,
        dots: !0,
        dotsClass: "carousel-dots",
        lazyLoad: !0,
        autoplay: !0,
        autoplayTimeout: 5e3
    });
}), new FeaturedBox(".featured-box").init(), _links && _links.each(function(e, i) {
    i.addEventListener("click", function(e) {
        e.preventDefault();
        var t = i.previousElementSibling;
        !0 === t.disabled ? ($(t).removeClass("border-bottom").addClass("border border-danger").css("border-radius", "5px"), 
        t.disabled = !1) : (t.disabled = !0, $(t).addClass("border-bottom").removeClass("border border-danger").css("border-radius", "0px"));
    });
});
//# sourceMappingURL=e-commerce-template.js.map