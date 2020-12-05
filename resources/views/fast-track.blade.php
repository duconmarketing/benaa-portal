<div class="">
    <button class="quickview__close" type="button">
        <svg width="20px" height="20px">
            <use xlink:href="{{asset('public/images/sprite.svg#cross-20')}}"></use>
        </svg>
    </button>
    <div class="row no-gutters" style="background-image: url({{asset('public/images/pop-up.jpg')}}); background-position: center; background-repeat: no-repeat;">
        <div class="col-sm-12">
            <div class="text-left" style="padding:25px;">
                <div class="product__info text-center">
                    <h3 class="product__name" style="color:white; text-align: left;">Fast Track Order</h3>
                </div>

                <p style="color:white;"><br>Drop us your Number and our Team will call you for the Order <br/>
                    ... ضع رقمك وسنتواصل معك في أقرب وقت</p>
                <form method="post" class="widget-newsletter__form" id="fast-track-form" action="{{URL('/fast-track-submit')}}">
                    @csrf
                    <input type=hidden name="oid" value="00D0O000000Z7K2">
                    <input type=hidden name="retURL" value="https://www.800benaa.com/">
                    <input id="recordType" name="recordType" type="hidden" value="0121r000000nbcQ" />
                    <input id="00N1r00000KB5yK" name="00N1r00000KB5yK" type="hidden" value="Prospect - Benaa" />

                    <!-- <div class="form-group">
                        <input name="name" id="name" required="" type="text" class="form-control" placeholder="Enter Your Name" autocomplete="off">
                    </div> -->
                    <div class="form-group row">
                        <div class="col-12 col-sm-7 col-lg-4">
                        <input name="phone" id="phone" style="height: calc(2.75rem + 2px);" required="" type="text" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off">
                        <span id="phone-info" class="invalid-feedback"></span>
                        </div>
                        <div class="col-12 col-sm-5 col-lg-3" style="text-align: center;">
                            <button class="btn btn-primary btn-lg" title="Subscribe" type="submit">Call Me</button>
                        </div>
                        <div class="col-12 col-sm-0 col-lg-5">
                        </div>
                    </div>

                    <small style="color:white;">
                        Or send your inquiry on <a href="mailto:sales@800benaa.com">sales@800benaa.com</a> <br/>
                        <a href="mailto:sales@800benaa.com">sales@800benaa.com</a> أو ارسل استفسارك على بريدنا الالكتروني
                    </small>
                    <br>
                </form>
            </div>
        </div>
        <!-- <div class="col-sm-5">
        <div class="background_bg h-100" ></div>
        </div> -->
    </div>
</div>
