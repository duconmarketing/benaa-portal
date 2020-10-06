@extends('layouts.app')

@section('title', 'Download 800Benaa Complete Catalogue - Your Online Hardware Store')

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
                    <li class="breadcrumb-item active" aria-current="page">Catalog</li>
                </ol>
            </nav>
        </div>
    </div>
    </div>
    <div class="checkout block">
        <div class="container">
        <iframe allowfullscreen="" allow="fullscreen" style="border:none;width:100%;height:1000px;" src="//e.issuu.com/embed.html?d=800benaa_catalogue&amp;hideIssuuLogo=true&amp;u=duconind"></iframe>
        </div>
    </div>
@endsection