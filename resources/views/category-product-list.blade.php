@extends('layouts.app')

@section('title', '800Benaa | '.$category)

@section('content')
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
                        <li class="breadcrumb-item active" aria-current="page">{{$category}}</li>
                    </ol>
                </nav>
            </div>
            <div class="page-header__title">
                <h1>{{ucwords(strtolower($category))}}</h1>
            </div>
        </div>
    </div>
    <div class="container" style="background-color: #fff;">
        <div class="shop-layout shop-layout--sidebar--start">
            <div class="shop-layout__sidebar">
                <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                    <div class="block-sidebar__backdrop"></div>
                    <div class="block-sidebar__body">
                        <div class="block-sidebar__header">
                            <div class="block-sidebar__title">Filters</div>
                            <button class="block-sidebar__close" type="button">
                                <svg width="20px" height="20px">
                                    <use xlink:href="images/sprite.svg#cross-20"></use>
                                </svg>
                            </button>
                        </div>

                        <div class="block-sidebar__item">
                            <div class="widget-filters__list">
                                <div class="widget-filters__item">
                                    <div class="filter filter--opened">
                                        <div class="filter__body" >
                                            <div class="filter__container" id="subCategorySidebar">
                                                <!-- category from ajax -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-filters__item">
                                    <div class="filter filter--opened" data-collapse-item>
                                        <button type="button" class="filter__title" data-collapse-trigger>
                                            Price
                                            <svg class="filter__arrow" width="12px" height="7px">
                                                <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                            </svg>
                                        </button>
                                        <div class="filter__body" data-collapse-content>
                                            <div class="filter__container">
                                                <div class="filter-price" data-min="{{$filterMin}}" data-max="{{$filterMax}}" data-from="{{$filterMin}}" data-to="{{$filterMax}}">
                                                    <div class="filter-price__slider"></div>
                                                    <div class="filter-price__title">Price: AED <span class="filter-price__min-value"></span> – AED <span class="filter-price__max-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-filters__item">
                                    <div class="filter filter--opened" data-collapse-item>
                                        <button type="button" class="filter__title" data-collapse-trigger>
                                            Brand
                                            <svg class="filter__arrow" width="12px" height="7px">
                                                <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
                                            </svg>
                                        </button>
                                        <div class="filter__body" data-collapse-content>
                                            <div class="filter__container">
                                                <div class="filter-list">
                                                    <div class="filter-list__list">
                                                        @foreach($brands as $key => $row)
                                                            <label class="filter-list__item ">
                                                                <span class="filter-list__input input-check">
                                                                    <span class="input-check__body">
                                                                        <input class="input-check__input" type="checkbox" value="{{$key}}" name="filter-brand">
                                                                        <span class="input-check__box"></span>
                                                                        <svg class="input-check__icon" width="9px" height="7px">
                                                                            <use xlink:href="{{asset('public/images/sprite.svg#check-9x7')}}"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <span class="filter-list__title">
                                                                    {{$key ? $key : 'NO BRANDS'}}
                                                                </span>
                                                                <span class="filter-list__counter">{{$row}}</span>
                                                            </label>
                                                        @endforeach                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-filters__actions d-flex">
                                    <button class="btn btn-primary btn-sm" id='filter-button'>Filter</button>
                                    <button class="btn btn-secondary btn-sm" id="filter-reset-button">Reset</button>
                                </div>
                                <input type="hidden" name="category" id="category" value="{{$results[0]['Product2']['Portal_Category__r']['Id']}}"/>
                                <input type="hidden" name="subcategory" id="subcategory" value=""/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="shop-layout__content">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
                            <div class="products-list__body">
                                @if(count($results) > 0)
                                    @foreach($results as $product)
                                        <div class="products-list__item">
                                            <div class="product-card ">
                                                <!--   <button class="product-card__quickview" type="button">
                                                       <svg width="16px" height="16px">
                                                           <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                       </svg>
                                                       <span class="fake-svg-icon"></span>
                                                   </button>
                                                   <div class="product-card__badges-list">
                                                       <div class="product-card__badge product-card__badge--new">New</div>
                                                   </div>  -->
                                                <div class="product-card__image product-image">
                                                    <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/subcat/{{$product['Id']}}" class="product-image__body">
                                                        <img class="product-image__img" src="{{$product['Product2']['Thumbnails_URL__c']}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/subcat/{{$product['Id']}}">{{$product['Name']}}</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__availability">
                                                        Availability: <span class="text-success">In Stock</span>
                                                    </div>
                                                    <div class="product-card__prices">
                                                        AED {{$product['UnitPrice']}}
                                                    </div>
                                                    <form action="{{URL::to('/addtocart')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$product['Id']}}" />
                                                        <input type="hidden" name="name" value="{{$product['Name']}}" />
                                                        <input type="hidden" name="price" value="{{$product['UnitPrice']}}" />
                                                        <input type="hidden" name="image" value="{{$product['Product2']['Thumbnails_URL__c']}}" />
                                                        <input type="hidden" name="link" value="{{URL::to('/')}}/product/{{$category}}/{{$category}}/{{$product['Id']}}" />

                                                        <div class="product-card__buttons">
                                                            @if($product['Product2']['Out_Of_Stock__c'])
                                                                <span class="badge badge-danger">Out of Stock</span>
                                                            @else
                                                                <button class="btn btn-primary product-card__addtocart" data-id="{{$product['Id']}}" data-name="{{$product['Name']}}" data-price="{{$product['UnitPrice']}}" data-image="{{$product['Product2']['Thumbnails_URL__c']}}" data-link="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/subcat/{{$product['Id']}}" type="submit">Add To Cart</button>
                                                            @endif                                                                
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h2>No Products</h2>
                                @endif
                            </div>
                            <div class="products-view__pagination"></div>
                        </div>                        
                        <div class="products-view__pagination1">
                            {{$results->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        const setSideBar = function(html) {
            if (html) {
                $('#subCategorySidebar').html(html);
            }
        };
        $.ajax({
            url: BaseUrl + '/cat-list',
            method: 'GET',
            data:{parentId : '{{$parentId}}'},
            success: function(data) {
                xhr = null;
                setSideBar(data);
            }
        });
    </script>

@endsection
