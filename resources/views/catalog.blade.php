@extends('layouts.app')

@section('title', 'Download 800Benaa Complete Catalogue - Your Online Hardware Store')

@section('content')
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
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

<script>
    // to show fast track form popup in the home page
    const modal = $('#quickview-modal');
    const timeout = setTimeout(function() {
        res = $.ajax({
            url: '{{URL("catalog-popup")}}',
            success: function(data) {
                modal.find('.modal-content').html(data);
                modal.modal('show');
                modal.find('.quickview__close').on('click', function() {
                    modal.modal('hide');
                });
            }
        });
    }, 1000);
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
