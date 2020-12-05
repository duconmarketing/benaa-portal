<style>
ul.suggestion{
    font-size: 14px;
    list-style-type: none;
    padding-left: 5px;
}
ul.suggestion li{
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-weight: bold;
}
ul.suggestion li a{
    text-decoration: none;
    color:default;
}
</style>
<div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
    <div class="container">
    <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
            <div class="products-list__body">
                @if(count($result) > 0)
                    <div class="row" style="min-width:100%;">
                        <div class="col-md-3 d-none d-sm-block">
                            <p style="background-color: #3d464d;" class="text-center mt-3 font-weight-bold text-light">Suggestions</p>
                            <ul class="suggestion">
                                @foreach(array_slice($suggestion['products'], 0, 4) as $row)
                                    <li><a href="" class="suggestionKey">{{ucfirst(strtolower($row))}}</a></li>
                                @endforeach
                            </ul>

                            <p style="background-color: #3d464d;" class="text-center mt-3 font-weight-bold text-light">Categories</p>
                            <ul class="suggestion">
                                @foreach(array_slice($suggestion['categories'], 0, 4) as $row)
                                    <li><a class="" href="{{URL::to('/')}}/product/{{$row['Id']}}">{{ucfirst(strtolower($row['Name']))}}</a></li>
                                @endforeach
                            </ul>

                            <p style="background-color: #3d464d;" class="text-center mt-3 font-weight-bold text-light">Brands</p>
                            <ul class="suggestion">
                                @foreach(array_slice($suggestion['brands'], 0, 4) as $row)
                                    <li><a class="suggestionKey">{{ucfirst(strtolower($row))}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach($result as $row)
                                    <div class="products-list__item">
                                        <div class="product-card">
                                            <div class="product-card__image product-image" style="padding:5px 18px 5px;">
                                                <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$row['Id']}}" class="product-image__body">
                                                    <img class="product-image__img" src="{{$row['Product2']['Thumbnails_URL__c']}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$row['Id']}}" class="a_title_ajx">{{$row['Name']}}</a>
                                                </div>
                                            </div>
                                            <div class="product-card__actions" style="padding: 0 24px 10px;">
                                                <div class="product-card__availability">
                                                    Availability: <span class="text-success">In Stock</span>
                                                </div>
                                                <div class="product-card__prices">
                                                    AED {{$row['UnitPrice']}}
                                                </div>
                                                <div class="product-card__buttons" style="margin-top:10px;">
                                                    @if($row['Product2']['Out_Of_Stock__c'])
                                                        <span class="badge badge-danger">Out of Stock</span>
                                                    @else
                                                        <button class="btn btn-primary product-card__addtocart" data-id="{{$row['Id']}}" data-name="{{$row['Name']}}" data-price="{{$row['UnitPrice']}}" data-image="{{$row['Product2']['Default_Image_URL__c']}}" data-link="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$row['Id']}}" type="submit">
                                                            <small>Add to Cart</small>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="badge">
                                    <a class="viewAllResults" href="">View All Results</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row w-100">
                        <div class="col-md-12 text-center">
                            No Results!
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    $('.suggestionKey').click(function(){
        event.preventDefault();
        console.log($(this).html());
        window.location.replace("{{URL::to('/')}}/search?searchKey=" + $(this).html());
    });
    $(".viewAllResults").click(function(){
        event.preventDefault();
        $(".search__form").submit();
    });
</script>
