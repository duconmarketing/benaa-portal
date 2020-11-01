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
                                        <div class="filter__container">
                                            <!-- category from ajax -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            @foreach($results as $subCategory)
                                <div class="products-list__item">
                                    <div class="product-card text-center">
                                        <div class="post-card__image">
                                            <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{$subCategory['Id']}}">
                                                <img src="{{$subCategory['Image_URL__c']}}" alt="{{$subCategory['Name']}}">
                                            </a>
                                        </div>
                                        <div class="post-card__info mt-2 mb-2">
                                            <div class="post-card__name text-center">
                                                <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{$subCategory['Id']}}">{{$subCategory['Name']}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="products-view__pagination">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const setSideBar = function(html) {
        if (html) {
            $('.filter__container').html(html);
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
