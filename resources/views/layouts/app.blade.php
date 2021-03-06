<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('public/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('public/images/apple-touch-icon.png')}}">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{asset('public/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/photoswipe/photoswipe.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/photoswipe/default-skin/default-skin.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{asset('public/vendor/fontawesome/css/all.min.css')}}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{asset('public/fonts/stroyka/stroyka.css')}}">
    <script>
        BaseUrl = "{{URL('/')}}";
        addToCartUrl = '{{URL("addtocart-ajax")}}';
    </script>
    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <style>
        /*
        .fa-instagram {
        color: transparent;
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
        background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
        background-clip: text;
        -webkit-background-clip: text;
        font-size: 35px;
        }
        .social-links__link--type--instagram{
            background: transparent;
        }*/
        .footer-links__item, .footer-contacts__text, .footer-newsletter__text, .site-footer__copyright{color: #b3bdc6;}
        .footer-contacts__title, .footer-links__title, .footer-newsletter__title{color: #e8e0e0;}
    </style>

</head>
<body>
<!-- site -->
<div class="site">

    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->

    <!-- mobile site__header -->
    <header class="site__header d-lg-none">
        <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
        <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
            <div class="mobile-header__panel">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                            <svg width="18px" height="14px">
                                <use xlink:href="{{asset('public/images/sprite.svg#menu-18x14')}}"></use>
                            </svg>
                        </button>
                        <a class="mobile-header__logo" href="<?= URL::to('/') ?>">
                            <!-- mobile-logo -->
                            <img src="{{asset('public/images/Benaa_Logo_mobile.png')}}" alt="800Benaa" />
                            <!-- mobile-logo / end -->
                        </a>
                        <div class="search search--location--mobile-header mobile-header__search">
                            <div class="search__body">
                                <form class="search__form" action="{{ url('search')}}" method="GET">
                                    <input class="search__input" name="searchKey" placeholder="What are you looking for?" aria-label="Site search" type="text" autocomplete="off">
                                    <button class="search__button search__button--type--submit" type="submit">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="{{asset('public/images/sprite.svg#search-20')}}"></use>
                                        </svg>
                                    </button>
                                    <button class="search__button search__button--type--close" type="button">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="{{asset('public/images/sprite.svg#cross-20')}}"></use>
                                        </svg>
                                    </button>
                                    <div class="search__border"></div>
                                </form>
                                <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
                            </div>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                                <button class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="{{asset('public/images/sprite.svg#search-20')}}"></use>
                                            </svg>
                                        </span>
                                </button>
                            </div>
                        <!-- <div class="indicator indicator--mobile d-sm-flex d-none">
                                    <a href="wishlist.html" class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="{{asset('public/images/sprite.svg#heart-20')}}"></use>
                                            </svg>
                                            <span class="indicator__value">0</span>
                                        </span>
                                    </a>
                                </div> -->
                            <div class="indicator indicator--mobile">
                                <a href="{{URL::to('/cart')}}" class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="{{asset('public/images/sprite.svg#cart-20')}}"></use>
                                            </svg>
                                            <span class="indicator__value">{{\Cart::count()}}</span>
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile site__header / end -->
    <!-- desktop site__header -->
    <header class="site__header d-lg-block d-none">
        <div class="site-header" style="background-color: #e9e9f0;">
            <!-- Toast -->
            <div class="toast" id="cart-added">
                Product Added to the cart
            </div>
            <!-- .topbar -->
            <div class="site-header__topbar topbar" style="background: #ec7c05;color:#ffffff; display: none;">
                <div class="topbar__container container">
                    <div class="topbar__row">
                        <div class="topbar__item topbar__item--link">
                            <a class="topbar-link" href="{{URL::to('/about-us')}}" style="color:#ffffff;">About Us</a>
                        </div>
                        <div class="topbar__item topbar__item--link">
                            <a class="topbar-link" href="{{URL::to('/contact-us')}}" style="color:#ffffff;">Contact Us</a>
                        </div>
                        <div class="topbar__spring"></div>
                        <div class="topbar__item">
                            <div class="topbar-dropdown">
                                <button class="topbar-dropdown__btn" type="button">
                                    <a class="menu__item-link" href="https://dev-800ducon.cs100.force.com/800Benaa/" target="_blank" style="color: #3d464d; font-weight: 600;">
                                        Sign In
                                    </a>
                                    <svg width="7px" height="5px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="topbar__item">
                            <div class="topbar-dropdown">
                                <button class="topbar-dropdown__btn" type="button">
                                    Currency: <span class="topbar__item-value" style="color:#ffffff;">AED</span>
                                    <svg width="7px" height="5px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .topbar / end -->
            <div class="site-header__middle container h-auto p-2">
                <div class="site-header__logo mr-0">
                    <a href="<?= URL::to('/') ?>">
                        <!-- logo -->
                        <img src="{{asset('public/images/Benaa_Logo.png')}}" alt="800Benaa" />
                        <!-- logo / end -->
                    </a>
                </div>
                <div class="site-header__search" style="background: #fff; width: 70%;">
                    <div class="search search--location--header ">
                        <div class="search__body">
                            <form class="search__form" action="{{ url('search')}}" method="GET">
                                <select class="search__categories" aria-label="Category" id="categorySearchList" style="text-transform: capitalize; display: none;">
                                </select>
                                <input class="search__input" name="searchKey" placeholder="What are you looking for?" aria-label="Site search" type="text" autocomplete="off">
                                <button class="search__button search__button--type--submit" type="submit">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="{{asset('public/images/sprite.svg#search-20')}}"></use>
                                    </svg>
                                </button>
                                <div class="search__border"></div>
                            </form>
                            <div class="search__suggestions suggestions suggestions--location--header"></div>
                        </div>
                    </div>
                </div>
                <div class="site-header__phone ml-3" style="display: flex;">
                <!-- <div>
                            <button class="topbar-dropdown__btn" type="button">
                                <img src="{{asset('public/images/ae.svg')}}">
                                <span class="topbar__item-value" style="color:#000000;">AED</span>
                            </button>
                        </div>  -->
                    <svg width="20px" height="20px" style="margin-top: 3px;">
                        <use xlink:href="{{asset('public/images/sprite.svg#user-thin')}}"></use>
                    </svg>
                    <button class="topbar-dropdown__btn pl-0" type="button">
                        <a class="menu__item-link" href="https://dev-800ducon.cs100.force.com/800Benaa/" target="_blank" style="color: #3d464d; font-weight: 400; font-style: italic; font-size: 14px;">
                            Sign In
                        </a>
                    </button>
                </div>
            </div>
            <div class="site-header__nav-panel">
                <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
                    <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                            <!-- .nav-links -->
                            <div class="nav-panel__nav-links nav-links" id="main-menu-div"  style="margin-left: -10px;"></div>
                            <!-- .nav-links / end -->
                            <div class="nav-panel__indicators" style="color: #ec7c05;">
                                <div class="indicator indicator--trigger--click">
                                    <a href="{{URL::to('/cart')}}" class="indicator__button">
                                            <span class="indicator__area">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="{{asset('public/images/sprite.svg#cart-20')}}"></use>
                                                </svg>
                                                <span class="indicator__value" style="background: #ec7c05;">{{\Cart::count()}}</span>
                                            </span>
                                    </a>
                                    <div class="indicator__dropdown">
                                        <!-- .dropcart -->
                                        <div class="dropcart dropcart--style--dropdown">
                                            <div class="dropcart__body">
                                                @if(count(\Cart::content()) > 0)
                                                    <form method="post" action="{{URL::to('/deleteitem')}}">
                                                        @csrf
                                                        <div class="dropcart__products-list">
                                                            @foreach(\Cart::content() as $items)
                                                                <input type="hidden" name="rowId" value="{{$items->rowId}}" />
                                                                <div class="dropcart__product">
                                                                    <div class="product-image dropcart__product-image">
                                                                        <a href="{{$items->options->link}}" class="product-image__body">
                                                                            <img class="product-image__img" src="{{$items->options->image}}" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="dropcart__product-info">
                                                                        <div class="dropcart__product-name"><a href="{{$items->options->link}}">{{ucwords(strtolower($items->name))}}</a></div>
                                                                        <!-- <ul class="dropcart__product-options">
                                                                            <li>Color: Yellow</li>
                                                                            <li>Material: Aluminium</li>
                                                                        </ul> -->
                                                                        <div class="dropcart__product-meta">
                                                                            <span class="dropcart__product-quantity">{{$items->qty}}</span> ×
                                                                            <span class="dropcart__product-price">{{$items->price}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" name="submit" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon" value="delete">
                                                                        <svg width="10px" height="10px">
                                                                            <use xlink:href="{{asset('public/images/sprite.svg#cross-10')}}"></use>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </form>
                                                    <div class="dropcart__totals">
                                                        <table>
                                                            <tr>
                                                                <th>Subtotal</th>
                                                                <td>AED {{\Cart::subtotal()}}</td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <th>Shipping</th>
                                                                <td>Not Calculated</td>
                                                            </tr> -->
                                                            <tr>
                                                                <th>Tax</th>
                                                                <td>AED {{\Cart::tax()}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total</th>
                                                                <td>AED {{\Cart::total()}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="dropcart__buttons">
                                                        <a class="btn btn-secondary" href="{{URL::to('/cart')}}">View Cart</a>
                                                        <a class="btn btn-primary" href="{{URL::to('/checkout')}}">Checkout</a>
                                                    </div>
                                                @else
                                                    <div class="dropcart__empty">Your shopping cart is empty!</div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- .dropcart / end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="site__body">
        <!-- desktop site__header / end -->

    <!--        <nav id="navigation">
            <div class="container">
                <div id="responsive-nav">
                    <ul class="main-nav nav navbar-nav">
                        <li class="active"><a href="<?= URL::to('/') ?>">Home</a></li>
                        <li><a href="#">Hot Deals</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Laptops</a></li>
                        <li><a href="#">Smartphones</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
                </div>
            </div>
        </nav>-->

        <!-- SECTION -->
        <!--<div class="section">-->
    @yield('content')
    <!--</div>-->

    </div>
    <!-- site__footer -->
    <footer class="site__footer">
        <div class="site-footer">
            <div class="container">
                <div class="site-footer__widgets">

                    <div class="row" style="padding-top: 10px;">
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">Get to Know Us</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="{{URL::to('/about-us')}}" class="footer-links__link">About 800Benaa</a></li>
                                    {{--<li class="footer-links__item"><a href="" class="footer-links__link">Privacy Policy</a></li> --}}
                                    <li class="footer-links__item"><a href="{{URL::to('/contact-us')}}" class="footer-links__link">Get in touch</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">Shop with Us</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="https://dev-800ducon.cs100.force.com/800Benaa/" target="_blank" class="footer-links__link">Your Account</a></li>
                                    {{--<li class="footer-links__item"><a href="" class="footer-links__link">Privacy Policy</a></li>
                                    <li class="footer-links__item"><a href="{{URL::to('/contact-us')}}" class="footer-links__link">Get in touch</a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">Let Us Help You</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="{{URL::to('/about-us')}}" class="footer-links__link">Help</a></li>
                                    <li class="footer-links__item"><a href="" class="footer-links__link">FAQs</a></li>
                                    {{--<li class="footer-links__item"><a href="{{URL::to('/contact-us')}}" class="footer-links__link">Get in touch</a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">Connect with us</h5>
                                <ul class="social-links__list social-links--shape--circle" style="text-align: center; margin: 0;">
                                    <li class="social-links__item">
                                        <a class="social-links__link social-links__link--type--facebook" href="https://www.facebook.com/800benaa" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="social-links__item">
                                        <a class="social-links__link social-links__link--type--instagram" href="https://www.instagram.com/800benaa/" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="site-footer__widget footer-newsletter">
                                <h5 class="footer-newsletter__title">First to Know</h5>
                                <div class="footer-newsletter__text">
                                    Join 800Benaa and get the latest news, offers and products delivered to your inbox.
                                </div>
                                <form action="https://www.createsend.com/t/subscribeerror?description=" id="subForm" data-id="A61C50BEC994754B1D79C5819EC1255C0A07DC04AFC6EEEE7E892521FE370A2BE784BDD990CB6A22545DCF7D932BC9116F94D363A3A70A1DDFDE9A623DFC607D"  class="footer-newsletter__form" method="POST">

                                    <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                    <input class="footer-newsletter__form-input form-control" id="fieldEmail" name="cm-jilthjr-jilthjr" required type="email" placeholder="Email Address..."/>

                                    <button class="footer-newsletter__form-button btn btn-primary" type="submit" style="padding: 0 2px 0 2px;">Subscribe</button>
                                </form>
                                <div class="footer-newsletter__text">
                                    <span id="email-info" class="invalid-feedback"></span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="site-footer__bottom">
                    <div class="site-footer__copyright" style="margin-top: 9px;">
                        <!-- copyright -->
                        <p>© Copyright <script type="text/javascript">document.write(new Date().getFullYear())</script> <a class="topbar__item-value" href="#">800Benaa</a>. All Rights Reserved. &nbsp;
                            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">Refund Policy</a>  &nbsp;&nbsp;&nbsp;&nbsp; <a href="">Privacy Policy</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="">Consumer Right</a> --></p>
                        <!-- copyright / end -->
                    </div>

                    <div class="site-footer__payments">
                        <img src="{{asset('public/images/payments.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="totop">
                <div class="totop__body">
                    <div class="totop__start"></div>
                    <div class="totop__container container"></div>
                    <div class="totop__end">
                        <button type="button" class="totop__button">
                            <svg width="13px" height="8px">
                                <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-up-13x8')}}"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- site__footer / end -->
</div>
<!-- site / end -->

<!-- mobilemenu -->
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <div class="mobilemenu__header">
            <div class="mobilemenu__title">Menu</div>
            <button type="button" class="mobilemenu__close">
                <svg width="20px" height="20px">
                    <use xlink:href="{{asset('public/images/sprite.svg#cross-20')}}"></use>
                </svg>
            </button>
        </div>
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="<?= URL::to('/') ?>" class="mobile-links__item-link">Home</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="" class="mobile-links__item-link">Categories</a>
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="mobile-links__item-sub-links" data-collapse-content id="categoryMobile">

                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="shop" class="mobile-links__item-link">Shop</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="account-login.html" class="mobile-links__item-link">Account</a>
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                            </svg>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- mobilemenu / end -->
<!-- photoswipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        const setMainMenu = function (html) {
            if (html) {
                $('#main-menu-div').html(html);
            }
        };
        $.ajax({
            url: BaseUrl + '/main-cat-list',
            method: 'GET',
            success: function (data) {
                xhr = null;
                setMainMenu(data);
            }
        });
    });
</script>
<!-- photoswipe / end -->
<!-- js -->
<script src="{{ asset('public/js/app.js') }}" defer></script>
<script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('public/vendor/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('public/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('public/vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('public/js/number.js') }}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
<script src="{{ asset('public/vendor/svg4everybody/svg4everybody.min.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css" rel="stylesheet" />
<script src="{{ asset('public/js/pagination.js') }}"></script>
<script>
    svg4everybody();
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $.get("{{URL::to('/')}}/api/categories", function( data ) {
        var homeUrl = "{{URL::to('/')}}";
        categories = JSON.parse(data);
        var menuString = '<div class="row">';
        var mobileMenuString = '<ul class="mobile-links mobile-links--level--1">';
        for (i = 0; i < categories.length; i++) {
            if(i%2 == 0){
                menuString += '<div class="col-4"> <ul class="megamenu__links megamenu__links--level--0">';
            }
            menuString += '<li class="megamenu__item">';
            menuString += '<a style="text-transform: capitalize;" href="{{URL::to('/')}}/product/' + categories[i].Id +'">' + categories[i].Name.toLowerCase() +'</a>';
            menuString += '<ul class="megamenu__links megamenu__links--level--1">';
            menuString += '</ul></li>';
            if(i%2 == 1){
                menuString += '</ul></div>';
            }
            mobileMenuString += '<li class="mobile-links__item" data-collapse-item><div class="mobile-links__item-title">';
            mobileMenuString += '<a href="{{URL::to('/')}}/product/' + categories[i].Id +'" class="mobile-links__item-link">' + categories[i].Name.toLowerCase() + '</a></div></li>';
        }
        menuString += '</ul></div>';
        //document.getElementById('categoryTopMenu').innerHTML = menuString;
        document.getElementById('categoryMobile').innerHTML = mobileMenuString;
    });
</script>
<script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 6516451;
    (function() {
        var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    })();
</script>
<script>
    // footer newsletter form submission
    $(document).on('submit', "#subForm", function(){
        event.preventDefault();
        var em=$('#fieldEmail').val();
        if(!(em)) {
            $("#email-info").html("Please enter email address").show();
            return false;
        } else if(IsEmail(em)==false) {
            $("#email-info").html("Invalid email address").show();
            return false;
        } else {
            $("#email-info").html("");
            $.post($(this).attr('action'), $(this).serialize(), function (res) {
                console.log(res);
            });
        }
    });

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        }else{
            return true;
        }
    }

</script>

</body>
</html>
