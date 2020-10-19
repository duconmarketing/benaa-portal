<div class="">
    <button class="quickview__close" type="button">
        <svg width="20px" height="20px">
            <use xlink:href="{{asset('public/images/sprite.svg#cross-20')}}"></use>
        </svg>
    </button>
    <div class="row no-gutters">
        <div class="col-sm-12">
            <div class="text-left" style="padding:50px;">
                <div class="product__info text-center">
                    <h3 class="product__name">VIEW YOUR CATALOG</h3>
                </div>
                <p style="color:#687188;">Know more about our products and pricing</p>
                <form method="post" class="widget-newsletter__form" id="catalog-popup-form" >
                    @csrf
                   <!--  <input type=hidden name="oid" value="00D0O000000Z7K2">
                    <input type=hidden name="retURL" value="https://www.800benaa.com/">
                    <input id="recordType" name="recordType" type="hidden" value="0121r000000nbcQ" />
                    <input id="00N1r00000KB5yK" name="00N1r00000KB5yK" type="hidden" value="Prospect - Benaa" />  -->

                    <div class="form-group">
                        <input name="fname" id="fname" required="" type="text" class="form-control" placeholder="First Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input name="lname" id="lname" required="" type="text" class="form-control" placeholder="Last Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input name="email" id="email" required="" type="text" class="form-control" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input name="phone" id="phone" required="" type="text" class="form-control" placeholder="Phone Number" autocomplete="off">
                        <span id="phone-info" class="invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" title="Subscribe" type="submit">Submit</button>
                    </div>
                   <!--  <small style="color:#687188;">
                        Or send your inquiry on <a href="mailto:sales@800benaa.com">sales@800benaa.com</a> <br/>
                        <a href="mailto:sales@800benaa.com">sales@800benaa.com</a> أو ارسل استفسارك على بريدنا الالكتروني
                    </small>  -->
                </form>
            </div>
        </div>
    </div>
</div>
