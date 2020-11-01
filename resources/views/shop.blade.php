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
<div class="block block--highlighted block-categories block-categories--layout--classic">
<div class="container">
    <div class="block-categories__list"  >
        @foreach($categories as $category)
        <div class="block-categories__item category-card category-card--layout--classic" style="float: left;"   >
            <div class="category-card__body">
                <div class="category-card__image">
                    <a href="{{URL::to('/')}}/product/{{$category['Id']}}">
                        <img src="{{$category['Image_URL__c']}}" alt="{{$category['Name']}}" >
                    </a>
                    <div class="category-card__name">
                        <a href="{{URL::to('/')}}/product/{{$category['Id']}}">{{$category['Name']}}</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection
