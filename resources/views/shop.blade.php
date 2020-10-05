@extends('layouts.app')

@section('title', '800Benaa | Shop')

@section('content')

<div class="page-header">
    <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{URL::to('/')}}">Home</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>
        </div>
        <div class="page-header__title">
            <h1>Shop</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="block">
                <div class="products-view">
                    <div class="products-view__list products-list" data-layout="grid-4-full" data-mobile-grid-columns="2" data-with-features="false">
                        <div class="products-list__body">
                            @foreach($categories as $category)
                                <div class="products-list__item">
                                    <div class="product-card product-card--hidden-actions text-center">
                                        <div class="product-card__image product-image">
                                            <a class="product-image__body" href="{{URL::to('/')}}/product/{{$category['Id']}}">
                                                <img src="{{$category['Image_URL__c']}}" alt="{{$category['Name']}}" class="product-image__img">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name text-center">
                                                <a href="{{URL::to('/')}}/product/{{$category['Id']}}">{{$category['Name']}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach                            
                        </div>
                    </div>                    
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection