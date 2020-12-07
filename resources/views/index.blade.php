@extends('layouts.app')

@section('title', 'Largest Supplier of Power Tools | Building Materials Online in UAE')

@section('content')

<style>
.block-features__icon{fill:#fff;}
.block-features__content{color: #fff;}
</style>

<!-- .block-slideshow -->
<div class="block-slideshow block-slideshow--layout--full block">
    <div class="container">
        <div class="row">
            <!--<div class="col-lg-3 d-none d-lg-block"></div>-->
            <div class="col-12">
                <div class="block-slideshow__body">
                    <div class="owl-carousel">
                        <a class="block-slideshow__slide" href="product/a1d1x000000Nq2tAAC">
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
                        <a class="block-slideshow__slide" href="product/a1d1x000000Nq2tAAC">
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
                        <a class="block-slideshow__slide" href="product/a1d1x000000Nq2nAAC">
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
        <div class="block-features__list" style="background-color:#ec7613;">
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                    <use xlink:href="{{asset('public/images/sprite.svg#shipping-truck')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Delivery</div>
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
                    <div class="block-features__title">Fast Track Order</div>
                    <div class="block-features__subtitle">Drop us your Number</div>
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
                    <div class="block-features__title">100% Safety</div>
                    <div class="block-features__subtitle">Only secure payments</div>
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
                        <div class="block-features__title">Our Catalog</div>
                        <div class="block-features__subtitle">Download the Catalog</div>
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
        <div class="block-categories__list" id="categoryDiv">
            <div class="block-categories__item category-card category-card--layout--classic">
                <div class="category-card__body">
                    <div class="category-card__image">
                        <a href=""><img src="{{asset('public/images/categories/category-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="category-card__content">
                        <div class="category-card__name">
                            <a href="">Power Tools</a>
                        </div>
                        <ul class="category-card__links">
                            <li><a href="">Screwdrivers</a></li>
                            <li><a href="">Milling Cutters</a></li>
                            <li><a href="">Sanding Machines</a></li>
                            <li><a href="">Wrenches</a></li>
                            <li><a href="">Drills</a></li>
                        </ul>
                        <div class="category-card__all">
                            <a href="">Show All</a>
                        </div>
                        <div class="category-card__products">
                            572 Products
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
                <div class="category-card__body">
                    <div class="category-card__image">
                        <a href=""><img src="images/categories/category-2.jpg" alt=""></a>
                    </div>
                    <div class="category-card__content">
                        <div class="category-card__name">
                            <a href="">Hand Tools</a>
                        </div>
                        <ul class="category-card__links">
                            <li><a href="">Screwdrivers</a></li>
                            <li><a href="">Hammers</a></li>
                            <li><a href="">Spanners</a></li>
                            <li><a href="">Handsaws</a></li>
                            <li><a href="">Paint Tools</a></li>
                        </ul>
                        <div class="category-card__all">
                            <a href="">Show All</a>
                        </div>
                        <div class="category-card__products">
                            134 Products
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
                <div class="category-card__body">
                    <div class="category-card__image">
                        <a href=""><img src="images/categories/category-4.jpg" alt=""></a>
                    </div>
                    <div class="category-card__content">
                        <div class="category-card__name">
                            <a href="">Machine Tools</a>
                        </div>
                        <ul class="category-card__links">
                            <li><a href="">Lathes</a></li>
                            <li><a href="">Milling Machines</a></li>
                            <li><a href="">Grinding Machines</a></li>
                            <li><a href="">CNC Machines</a></li>
                            <li><a href="">Sharpening Machines</a></li>
                        </ul>
                        <div class="category-card__all">
                            <a href="">Show All</a>
                        </div>
                        <div class="category-card__products">
                            301 Products
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
                <div class="category-card__body">
                    <div class="category-card__image">
                        <a href=""><img src="images/categories/category-3.jpg" alt=""></a>
                    </div>
                    <div class="category-card__content">
                        <div class="category-card__name">
                            <a href="">Power Machinery</a>
                        </div>
                        <ul class="category-card__links">
                            <li><a href="">Generators</a></li>
                            <li><a href="">Compressors</a></li>
                            <li><a href="">Winches</a></li>
                            <li><a href="">Plasma Cutting</a></li>
                            <li><a href="">Electric Motors</a></li>
                        </ul>
                        <div class="category-card__all">
                            <a href="">Show All</a>
                        </div>
                        <div class="category-card__products">
                            79 Products
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
                <div class="category-card__body">
                    <div class="category-card__image">
                        <a href=""><img src="images/categories/category-5.jpg" alt=""></a>
                    </div>
                    <div class="category-card__content">
                        <div class="category-card__name">
                            <a href="">Measurement</a>
                        </div>
                        <ul class="category-card__links">
                            <li><a href="">Tape Measure</a></li>
                            <li><a href="">Theodolites</a></li>
                            <li><a href="">Thermal Imagers</a></li>
                            <li><a href="">Calipers</a></li>
                            <li><a href="">Levels</a></li>
                        </ul>
                        <div class="category-card__all">
                            <a href="">Show All</a>
                        </div>
                        <div class="category-card__products">
                            366 Products
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-categories__item category-card category-card--layout--classic">
                <div class="category-card__body">
                    <div class="category-card__image">
                        <a href=""><img src="images/categories/category-6.jpg" alt=""></a>
                    </div>
                    <div class="category-card__content">
                        <div class="category-card__name">
                            <a href="">Clothes and PPE</a>
                        </div>
                        <ul class="category-card__links">
                            <li><a href="">Winter Workwear</a></li>
                            <li><a href="">Summer Workwear</a></li>
                            <li><a href="">Helmets</a></li>
                            <li><a href="">Belts and Bags</a></li>
                            <li><a href="">Work Shoes</a></li>
                        </ul>
                        <div class="category-card__all">
                            <a href="">Show All</a>
                        </div>
                        <div class="category-card__products">
                            81 Products
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block block-features block-features--layout--classic">
    <div class="container">
        <div class="block-features__list" style="background: linear-gradient(45deg, #000, transparent); border: none;">

            <div class="block-features__item">

                <div class="block-features__content"  style="cursor: pointer;">
                    <div class="block-features__title" style="padding-top: 10px;">We're Always Here To Help</div>
                </div>
            </div>

            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="{{asset('public/images/sprite.svg#icon-email')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <a style="color:inherit;" href="mailto:sales@800benaa.com">
                    <div class="block-features__title" style="padding-top: 10px;">sales@800benaa.com</div>
                    </a>
                </div>
            </div>

            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="{{asset('public/images/sprite.svg#icon-phone')}}"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <a style="color:inherit;" href="tel:80023622">
                        <div class="block-features__title" style="padding-top: 10px;">800-23622</div>

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

