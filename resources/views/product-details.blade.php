@extends('layouts.app')

@section('title', '800Benaa | '.$details['entry']['Name'])

@section('content')
@if(isset($details))
<div class="page-header">
    <div class="page-header__container container" style="background-color: #fff;">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{URL::to('/')}}">HOME</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{URL::to('/')}}/product/{{$details['entry']['Product2']['Portal_Category__r']['Id']}}">{{$details['entry']['Product2']['Portal_Category__r']['Name']}}</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                        </svg>
                    </li>
                    @if(isset($details['entry']['Product2']['Portal_Subcategory__r']['Name']))
                        <li class="breadcrumb-item">
                            <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $details['entry']['Product2']['Portal_Category__r']['Name']))}}/{{$details['entry']['Product2']['Portal_Subcategory__r']['Id']}}">{{$details['entry']['Product2']['Portal_Subcategory__r']['Name']}}</a>
                            <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                            </svg>
                        </li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{$details['entry']['Name']}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="block">
    <div class="container" style="background-color: #fff;">
        <div class="product product--layout--standard" data-layout="standard" >
            <div class="product__content">
                <!-- .product__gallery -->
                <div class="product__gallery">
                    <div class="product-gallery">
                        <div class="product-gallery__featured">
                            <button class="product-gallery__zoom">
                                <svg width="24px" height="24px">
                                <use xlink:href="images/sprite.svg#zoom-in-24"></use>
                                </svg>
                            </button>
                            <div class="owl-carousel" id="product-image">
                                @if(count($details['images']) > 0)
                                @foreach($details['images'] as $img)
                                <div class="product-image product-image--location--gallery">
                                    <a href="{{$img['Image_URL__c']}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                        <img class="product-image__img" src="{{$img['Image_URL__c']}}" alt="">
                                    </a>
                                </div>
                                @endforeach
                                @else
                                    <div class="product-image product-image--location--gallery">
                                        <a href="{{$details['entry']['Product2']['Default_Image_URL__c']}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                            <img class="product-image__img" src="{{$details['entry']['Product2']['Default_Image_URL__c']}}" alt="">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                            <div class="product-gallery__carousel">
                                <div class="owl-carousel" id="product-carousel">
                                 @foreach($details['images'] as $img)
                                    <a href="{{$img['Image_URL__c']}}" class="product-image product-gallery__carousel-item">
                                        <div class="product-image__body">
                                            <img class="product-image__img product-gallery__carousel-image" src="{{$img['Image_URL__c']}}" alt="">
                                        </div>
                                    </a>
                                 @endforeach
                                </div>
                            </div>
                    </div>
                </div>
                <!-- .product__gallery / end -->
                <!-- .product__info -->
                <div class="product__info">
                    <div class="product__wishlist-compare">
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                            <svg width="16px" height="16px">
                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                            <svg width="16px" height="16px">
                            <use xlink:href="images/sprite.svg#compare-16"></use>
                            </svg>
                        </button>
                    </div>
                    <h1 class="product__name">{{$details['entry']['Name']}}</h1>
                    <div class="product__description">
                        {{$details['entry']['Product2']['Website_Description__c']}}
                    </div>
                    <ul class="product__features">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                    </ul>
                    <ul class="product__meta">
                        <li class="product__meta-availability">Availability: <span class="text-success">In Stock</span></li>
                        <li>Brand: <a href="#">{{$details['entry']['Product2']['Brand_Name__c'] ?? "No Brand"}}</a></li>
                        <li>SKU: {{$details['entry']['Product2']['SKU__c']}}</li>
                    </ul>
                </div>
                <!-- .product__info / end -->
                <!-- .product__sidebar -->
                <div class="product__sidebar">
                    <div class="product__availability">
                        Availability: <span class="text-success">In Stock</span>
                    </div>
                    <div class="product__prices">
                        AED {{$details['entry']['UnitPrice']}} / {{$details['entry']['Product2']['Unit__c'] ?? 'PCS'}}
                    </div>
                    <!-- .product__options -->
                    <form class="product__options" action="{{URL::to('/addtocart')}}" method="POST">
                        @csrf
                        <div class="form-group product__option">
                            <label class="product__option-label" for="product-quantity">Quantity</label>
                            <div class="product__actions">
                                <div class="product__actions-item">
                                    <div class="input-number product__quantity">
                                        <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1" name="quantity">
                                        <input type="hidden" name="id" value="{{$details['entry']['Id']}}" />
                                        <input type="hidden" name="name" value="{{$details['entry']['Name']}}" />
                                        <input type="hidden" name="price" value="{{$details['entry']['UnitPrice']}}" />
                                        <input type="hidden" name="image" value="{{$details['entry']['Product2']['Default_Image_URL__c']}}" />
                                        <input type="hidden" name="link" value="{{URL::to('/')}}/product/{{$details['entry']['Product2']['Portal_Category__c']}}/{{$details['entry']['Product2']['Portal_Subcategory__c'] ?? 'subcat'}}/{{$details['entry']['Id']}}" />
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </div>
                                <div class="product__actions-item product__actions-item--addtocart">
                                    <button class="btn btn-primary btn-lg product-card__addtocart" data-id="{{$details['entry']['Id']}}" data-name="{{$details['entry']['Name']}}" data-price="{{$details['entry']['UnitPrice']}}" data-image="{{$details['entry']['Product2']['Thumbnails_URL__c']}}" data-link="{{URL::to('/')}}/product/{{$details['entry']['Product2']['Portal_Category__c']}}/{{$details['entry']['Product2']['Portal_Subcategory__c'] ?? 'subcat'}}/{{$details['entry']['Id']}}">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- .product__options / end -->
                </div>
                <!-- .product__end -->
                <div class="product__footer">

                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="block">
    <div class="container">
        <div class="product product--layout--standard" data-layout="standard">
            <div class="product__content">
                <h2>Product Details are not available!</h2>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
