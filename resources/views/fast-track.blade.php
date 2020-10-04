<div class="">
    <button class="quickview__close" type="button">
        <svg width="20px" height="20px">
            <use xlink:href="{{asset('public/images/sprite.svg#cross-20')}}"></use>
        </svg>
    </button>
    <div class="row no-gutters">
        <div class="col-sm-7">
            <div class="text-left" style="padding:50px;">
                <div class="product__info text-center">        
                    <h3 class="product__name">Fast Track Order</h3>
                </div>
                <p style="color:#687188;">Drop us your Number and our Team will call you for the Order <br/>
                    ... ضع رقمك وسنتواصل معك في أقرب وقت</p>
                <form method="post" class="widget-newsletter__form" id="fast-track-form" action="{{URL('/fast-track-submit')}}">
                    @csrf
                    <div class="form-group">
                        <input name="name" id="name" required="" type="text" class="form-control" placeholder="Enter Your Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input name="phone" id="phone" required="" type="text" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off">
                        <span id="phone-info" class="invalid-feedback"></span>
                    </div>                    
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" title="Subscribe" type="submit">Contact</button>
                    </div>
                    <small style="color:#687188;">
                        Or send your inquiry on <a href="mailto:sales@800benaa.com">sales@800benaa.com</a> <br/>
                        <a href="mailto:sales@800benaa.com">sales@800benaa.com</a> أو ارسل استفسارك على بريدنا الالكتروني
                    </small>
                </form>
            </div>
        </div>
        <div class="col-sm-5">
        <div class="background_bg h-100" data-img-src="assets/images/popup_img.jpg" style="background-position: center center;
    background-size: cover;background-image: url(&quot;{{asset('public/images/popup_img.jpg')}}&quot;);"></div>            
        </div>
    </div>
</div>