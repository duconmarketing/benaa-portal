@extends('layouts.app')

@section('title', 'Largest Supplier of Power Tools | Building Materials Online in UAE')

@section('content')

<style>
    .block-features__divider{background : #f8c9a2 !important;}
</style>

<!-- .block-slideshow -->
<div class="block-slideshow block-slideshow--layout--full block">
    <div class="container">
        <div class="row">
            <!--<div class="col-lg-3 d-none d-lg-block"></div>-->
            <div class="col-12">
                <div class="block-slideshow__body">
                    <div class="owl-carousel">
                        <a class="block-slideshow__slide" href="product/a1g6900000m370YAAQ">
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('{{asset('public/images/slides/Benaa-Web-Banner1.jpg')}}')"></div>
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('{{asset('public/images/slides/Benaa-Web-Banner1-mob.jpg')}}')"></div>
                            <div class="block-slideshow__slide-content">
                                <div class="block-slideshow__slide-title">Hand Tool Collections</div>
                                <div class="block-slideshow__slide-text">Superior Quality Hand Tools For All Purposes</div>
                                <div class="block-slideshow__slide-button">
                                    <span class="btn btn-primary btn-lg">Shop Now</span>
                                </div>
                            </div>
                        </a>
                        <a class="block-slideshow__slide" href="product/a1g6900000m370YAAQ">
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('{{asset('public/images/slides/Benaa-Web-Banner3.jpg')}}')"></div>
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('{{asset('public/images/slides/Benaa-Web-Banner2-mob.jpg')}}')"></div>
                            <div class="block-slideshow__slide-content">
                                <div class="block-slideshow__slide-title">Power Tool Collections</div>
                                <div class="block-slideshow__slide-text">Power Tools that will help get the job done including <br/> cordless and corded drills, saws, <br/>impact wrenches, grinder and much more.</div>
                                <div class="block-slideshow__slide-button">
                                    <span class="btn btn-primary btn-lg">Shop Now</span>
                                </div>
                            </div>
                        </a>
                        <a class="block-slideshow__slide" href="product/a1g6900000m370SAAQ">
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('{{asset('public/images/slides/Benaa-Web-Banner2.jpg')}}')"></div>
                            <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('{{asset('public/images/slides/Benaa-Web-Banner3-mob.jpg')}}')"></div>
                            <div class="block-slideshow__slide-content">
                                <div class="block-slideshow__slide-title">Big Choice of Bathroom Accessories</div>
                                <div class="block-slideshow__slide-text">Complete your bathroom with our assortment of <br/>luxury bathroom accessories.</div>
                                <div class="block-slideshow__slide-button">
                                    <span class="btn btn-primary btn-lg">Shop Now</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .block-slideshow / end -->
<!-- .block-features -->
<div class="block block-features block-features--layout--classic">
    <div class="container">
        <div class="block-features__list">
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                    <use xlink:href="{{asset('public/images/sprite.svg#shipping-truck')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Delivery Across UAE</div>
                    <div class="block-features__subtitle">Within 3 working days</div>
                </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
                <div class="block-features__icon">
                    <a href="tel:80023622">
                        <svg width="48px" height="48px">
                        <use xlink:href="{{asset('public/images/sprite.svg#fi-24-hours-48')}}"></use>
                        </svg>
                    </a>
                </div>
                <div class="block-features__content" onclick="showFastTrack();" style="cursor: pointer;">
                    <div class="block-features__title">Order Instantly</div>
                    <div class="block-features__subtitle">FAST TRACK ORDER</div>
                </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                    <use xlink:href="{{asset('public/images/sprite.svg#fi-payment-security-48')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">High Quality</div>
                    <div class="block-features__subtitle">Top Brands</div>
                </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                    <use xlink:href="{{asset('public/images/sprite.svg#compare-16')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <a style="color:inherit;" href="{{URL('/catalog')}}">
                        <div class="block-features__title">Download Catalog</div>
                        <div class="block-features__subtitle">Complete product-list</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .block-features / end -->
<!-- .block-products-carousel -->

<!-- .block-products-carousel / end -->
<!-- .block-banner -->

<!-- .block-banner / end -->
<!-- .block-categories -->
<div class="block block--highlighted block-categories block-categories--layout--classic">
    <div class="container">
        <div class="block-categories__list" id="categoryDiv"><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370SAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/BATHROOMS.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370SAAQ" style="text-transform: capitalize;">BATHROOMS</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/bathrooms/a1g6900000m371JAAQ">shower  mixers &amp; accessories</a></li><li style="text-transform: capitalize;"><a href="product/bathrooms/a1g6900000m371IAAQ">basin mixers</a></li><li style="text-transform: capitalize;"><a href="product/bathrooms/a1g6900000m371MAAQ">bathroom accessories</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370SAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370TAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/BUILDERS EQUIPMENT &amp; CLEANING.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370TAAQ" style="text-transform: capitalize;">BUILDERS EQUIPMENT &amp; CLEANING</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/builders-equipment-&amp;-cleaning/a1g6900000m370kAAA">packaging</a></li><li style="text-transform: capitalize;"><a href="product/builders-equipment-&amp;-cleaning/a1g6900000m3712AAA">builders equipment</a></li><li style="text-transform: capitalize;"><a href="product/builders-equipment-&amp;-cleaning/a1g6900000m371FAAQ">hoses &amp; pumps</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370TAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370UAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/BUILDING MATERIALS.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370UAAQ" style="text-transform: capitalize;">BUILDING MATERIALS</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/building-materials/a1g6900000m3715AAA">builders metalwork</a></li><li style="text-transform: capitalize;"><a href="product/building-materials/a1g6900000m371TAAQ">cement additives &amp; dyes</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370UAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370VAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/DOOR FURNITURE, IRONMONGERY &amp; LOCKS.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370VAAQ" style="text-transform: capitalize;">DOOR FURNITURE, IRONMONGERY &amp; LOCKS</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/door-furniture,-ironmongery-&amp;-locks/a1g6900000m371OAAQ">hinges</a></li><li style="text-transform: capitalize;"><a href="product/door-furniture,-ironmongery-&amp;-locks/a1g6900000m370oAAA">door closers</a></li><li style="text-transform: capitalize;"><a href="product/door-furniture,-ironmongery-&amp;-locks/a1g6900000m371PAAQ">door locks</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370VAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370WAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/ELECTRICAL, LIGHTING &amp; VENTILATION.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370WAAQ" style="text-transform: capitalize;">ELECTRICAL, LIGHTING &amp; VENTILATION</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/electrical,-lighting-&amp;-ventilation/a1g6900000m370pAAA">lighting</a></li><li style="text-transform: capitalize;"><a href="product/electrical,-lighting-&amp;-ventilation/a1g6900000m370nAAA">ventilation</a></li><li style="text-transform: capitalize;"><a href="product/electrical,-lighting-&amp;-ventilation/a1g6900000m370qAAA">batteries</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370WAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370XAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/FLOORING &amp; TILING.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370XAAQ" style="text-transform: capitalize;">FLOORING &amp; TILING</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/flooring-&amp;-tiling/a1g6900000m3710AAA">tile spacer &amp; trims</a></li><li style="text-transform: capitalize;"><a href="product/flooring-&amp;-tiling/a1g6900000m370lAAA">flooring protection</a></li><li style="text-transform: capitalize;"><a href="product/flooring-&amp;-tiling/a1g6900000m371UAAQ">tile adhesives &amp; grouts</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370XAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370YAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/HAND &amp; POWER TOOLS.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370YAAQ" style="text-transform: capitalize;">HAND &amp; POWER TOOLS</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/hand-&amp;-power-tools/a1g6900000m370mAAA">drill bits</a></li><li style="text-transform: capitalize;"><a href="product/hand-&amp;-power-tools/a1g6900000m370xAAA">hand tools</a></li><li style="text-transform: capitalize;"><a href="product/hand-&amp;-power-tools/a1g6900000m371GAAQ">power tools</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370YAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370ZAAQ"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/INSULATION &amp; FILLERS.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370ZAAQ" style="text-transform: capitalize;">INSULATION &amp; FILLERS</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/insulation-&amp;-fillers/a1g6900000m370tAAA">insulation</a></li><li style="text-transform: capitalize;"><a href="product/insulation-&amp;-fillers/a1g6900000m371SAAQ">damp proof course</a></li><li style="text-transform: capitalize;"><a href="product/insulation-&amp;-fillers/a1g6900000m3718AAA">weather &amp; waterproofing</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370ZAAQ">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370aAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/LANDSCAPING &amp; FENCING.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370aAAA" style="text-transform: capitalize;">LANDSCAPING &amp; FENCING</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/landscaping-&amp;-fencing/a1g6900000m370vAAA">barrier &amp; fencing</a></li><li style="text-transform: capitalize;"><a href="product/landscaping-&amp;-fencing/a1g6900000m370rAAA">gardening</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370aAAA">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370bAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/PAINTING &amp; DECORATING.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370bAAA" style="text-transform: capitalize;">PAINTING &amp; DECORATING</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/painting-&amp;-decorating/a1g6900000m370wAAA">decorators tools</a></li><li style="text-transform: capitalize;"><a href="product/painting-&amp;-decorating/a1g6900000m370jAAA">fillers &amp; stucco</a></li><li style="text-transform: capitalize;"><a href="product/painting-&amp;-decorating/a1g6900000m370zAAA">paint</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370bAAA">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370cAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/AUTOMOTIVE.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370cAAA" style="text-transform: capitalize;">AUTOMOTIVE</a></div><ul class="category-card__links"></ul><div class="category-card__all"><a href="product/a1g6900000m370cAAA">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370dAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/PLUMBING &amp; HEATING.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370dAAA" style="text-transform: capitalize;">PLUMBING &amp; HEATING</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/plumbing-&amp;-heating/a1g6900000m371HAAQ">flexible connectors</a></li><li style="text-transform: capitalize;"><a href="product/plumbing-&amp;-heating/a1g6900000m371KAAQ">taps</a></li><li style="text-transform: capitalize;"><a href="product/plumbing-&amp;-heating/a1g6900000m371LAAQ">valves</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370dAAA">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370eAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/SAFETY WEAR &amp; CLOTHING.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370eAAA" style="text-transform: capitalize;">SAFETY WEAR &amp; CLOTHING</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/safety-wear-&amp;-clothing/a1g6900000m370yAAA">gloves</a></li><li style="text-transform: capitalize;"><a href="product/safety-wear-&amp;-clothing/a1g6900000m3719AAA">personal protective equipment (ppe)</a></li><li style="text-transform: capitalize;"><a href="product/safety-wear-&amp;-clothing/a1g6900000m371DAAQ">shirts &amp; tshirts &amp; pants</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370eAAA">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370fAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/SCREWS, NAILS &amp; FIXINGS.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370fAAA" style="text-transform: capitalize;">SCREWS, NAILS &amp; FIXINGS</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/screws,-nails-&amp;-fixings/a1g6900000m370iAAA">screws</a></li><li style="text-transform: capitalize;"><a href="product/screws,-nails-&amp;-fixings/a1g6900000m370sAAA">steel bar fixing</a></li><li style="text-transform: capitalize;"><a href="product/screws,-nails-&amp;-fixings/a1g6900000m3711AAA">fixings</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370fAAA">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370gAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/SEALANTS &amp; ADHESIVES.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370gAAA" style="text-transform: capitalize;">SEALANTS &amp; ADHESIVES</a></div><ul class="category-card__links"></ul><div class="category-card__all"><a href="product/a1g6900000m370gAAA">Show All</a></div></div></div></div><div class="block-categories__item category-card category-card--layout--classic"><div class="category-card__body"><div class="category-card__image"><a href="product/a1g6900000m370hAAA"><img src="https://www.800benaa.com/Customer%20Portal/800benaa/Category/TIMBER, MDF &amp; SHEET MATERIALS.jpg" alt=""></a><div class="category-card__name"><a href="product/a1g6900000m370hAAA" style="text-transform: capitalize;">TIMBER, MDF &amp; SHEET MATERIALS</a></div><ul class="category-card__links"><li style="text-transform: capitalize;"><a href="product/timber,-mdf-&amp;-sheet-materials/a1g6900000m371WAAQ">cement &amp; gypsum boards</a></li><li style="text-transform: capitalize;"><a href="product/timber,-mdf-&amp;-sheet-materials/a1g6900000m371XAAQ">plywood</a></li><li style="text-transform: capitalize;"><a href="product/timber,-mdf-&amp;-sheet-materials/a1g6900000m371YAAQ">mdf sheets</a></li></ul><div class="category-card__all"><a href="product/a1g6900000m370hAAA">Show All</a></div></div></div></div></div>
    </div>
</div>

<div class="block block-features block-features--layout--classic">
    <div class="container">
        <div class="block-features__list" style="background: linear-gradient(45deg, #525254, transparent); border: none; color: #ffffff;">

            <div class="block-features__item col-md-4 col-lg-4">

                <div class="block-features__content"  style="cursor: pointer;">
                    <div class="block-features__title" style="padding-top: 10px;">We're Always Here To Help</div>
                </div>
            </div>

            <div class="block-features__item col-md-4 col-lg-4">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="{{asset('public/images/sprite.svg#icon-email')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__subtitle" >Email for enquiry</div>
                    <a style="color:inherit;" href="mailto:sales@800benaa.com">
                    <div class="block-features__title" >sales@800benaa.com</div>
                    </a>
                </div>
            </div>

            <div class="block-features__item col-md-4 col-lg-4">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="{{asset('public/images/sprite.svg#icon-phone2')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__subtitle">Call Us at</div>
                    <a style="color:inherit;" href="tel:80023622">
                        <div class="block-features__title">800-23622</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- .block-categories / end -->
<script>
    // to show fast track form popup in the home page
    function showFastTrack(waitTime = 0){
        const modal = $('#quickview-modal');
        const timeout = setTimeout(function() {
            res = $.ajax({
                url: '{{URL("fast-track")}}',
                success: function(data) {
                    modal.find('.modal-content').html(data);
                    modal.modal('show');
                    modal.find('.quickview__close').on('click', function() {
                        modal.modal('hide');
                    });
                }
            });
        }, waitTime);
    }
    showFastTrack(1000);
    // fast track form submission
    $(document).on('submit', "#fast-track-form", function(){
        event.preventDefault();
        var ph=$('#phone').val();
        if(!(ph)) {
            $("#phone-info").html("Please enter Phone Number").show();
            return false;
        } else if(isNaN(ph)) {
            $("#phone-info").html("Please type only Numbers").show();
            return false;
        } else if(ph.length < 9) {
            $("#phone-info").html("Invalid mobile number").show();
            return false;
        } else if(phone_validate(ph)) {
            $("#phone-info").html("");
            $.post($(this).attr('action'), $(this).serialize(), function (res) {
                console.log(res);
            });
            modal.modal('hide');
        }
    });

    function phone_validate(phno){
        var regexPattern=new RegExp(/^[0-9-+]+$/);    // regular expression pattern
        return regexPattern.test(phno);
    }
</script>
@endsection

