@extends('layouts.app')

@section('title', '800Benaa | Page Not Found')

@section('content')

<div class="container bg-white pt-5" style="min-height:450px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="block">
                <h1 class="about-us__title">Sorry, the server is not responding at the moment, Please try again!</h1>
                <div class="order-success__actions text-center">
                    <a href="{{URL::to('/')}}" class="btn btn-xs btn-primary">Go To Home</a>
                </div>               
            </div>
        </div>
    </div>
</div>
@endsection