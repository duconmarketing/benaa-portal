
                <div class="products-list__item">
                    <div class="product-card ">
                        <div class="product-card__image product-image">
                            <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$product['Id']}}" class="product-image__body">
                                <img class="product-image__img" src="{{$product['Product2']['Thumbnails_URL__c']}}" alt="">
                            </a>
                        </div>
                        <div class="product-card__info">
                            <div class="product-card__name">
                                <a href="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$product['Id']}}">{{$product['Name']}}</a>
                            </div>
                        </div>
                        <div class="product-card__actions">
                            <div class="product-card__availability">
                                Availability: <span class="text-success">In Stock</span>
                            </div>
                            <div class="product-card__prices" >
                                AED {{$product['UnitPrice']}}
                            </div>
                            <form action="{{URL::to('/addtocart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product['Id']}}" />
                                <input type="hidden" name="name" value="{{$product['Name']}}" />
                                <input type="hidden" name="price" value="{{$product['UnitPrice']}}" />
                                <input type="hidden" name="image" value="{{$product['Product2']['Thumbnails_URL__c']}}" />
                                <input type="hidden" name="link" value="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$product['Id']}}" />
                                <div class="product-card__buttons">
                                    @if($product['Product2']['Out_Of_Stock__c'])
                                        <span class="badge badge-danger">Out of Stock</span>
                                    @else
                                        <button class="btn btn-primary product-card__addtocart" data-id="{{$product['Id']}}" data-name="{{$product['Name']}}" data-price="{{$product['UnitPrice']}}" data-image="{{$product['Product2']['Thumbnails_URL__c']}}" data-link="{{URL::to('/')}}/product/{{strtolower(str_replace(' ', '-', $category))}}/{{strtolower(str_replace(' ', '-', $subCategory))}}/{{$product['Id']}}" type="submit">Add To Cart</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>