<div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
    <div class="container">
        <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false" data-mobile-grid-columns="2">
            <div class="products-list__body">
                @if(count($result) > 0)
                <div class="row">
                    @foreach($result as $row)            
                    <div class="products-list__item">
                        <div class="product-card product-card--hidden-actions ">
                            <div class="product-card__image product-image">
                                <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$row['Id']}}" class="product-image__body">
                                    <img class="product-image__img" src="{{$row['Product2']['Default_Image_URL__c']}}" alt="">
                                </a>
                            </div>
                            <div class="product-card__info">
                                <div class="product-card__name">
                                    <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$row['Id']}}" class="a_title_ajx">{{$row['Name']}}</a>
                                </div>                                 
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">
                                    Availability: <span class="text-success">In Stock</span>
                                </div>
                                <div class="product-card__prices">
                                    AED {{$row['UnitPrice']}}
                                </div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" data-id="{{$row['Id']}}" data-name="{{$row['Name']}}" data-price="{{$row['UnitPrice']}}" data-image="{{$row['Product2']['Default_Image_URL__c']}}" data-link="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$row['Id']}}" type="submit">
                                        <small>Add to Cart</small>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>                   
                    @endforeach 
                </div>      
                @else
                    <li>
                        No results!
                    </li>        
                @endif
            </div>
        </div>
    </div>
</div>