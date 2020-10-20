<div class="dropcart__body">
    @if(count(\Cart::content()) > 0)
        <form method="post" action="{{URL::to('/deleteitem')}}">
            @csrf
            <div class="dropcart__products-list">
                @foreach(\Cart::content() as $items)
                    <input type="hidden" name="rowId" value="{{$items->rowId}}" />
                    <div class="dropcart__product">
                        <div class="product-image dropcart__product-image">
                            <a href="{{$items->options->link}}" class="product-image__body">
                                <img class="product-image__img" src="{{$items->options->image}}" alt="">
                            </a>
                        </div>
                        <div class="dropcart__product-info">
                            <div class="dropcart__product-name"><a href="{{$items->options->link}}">{{ucwords(strtolower($items->name))}}</a></div>
                            <div class="dropcart__product-meta">
                                <span class="dropcart__product-quantity">{{$items->qty}}</span> ×
                                <span class="dropcart__product-price">{{$items->price}}</span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon" value="delete">
                            <svg width="10px" height="10px">
                                <use xlink:href="{{asset('public/images/sprite.svg#cross-10')}}"></use>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </form>
        <div class="dropcart__totals">
            <table>
                <tr>
                    <th>Subtotal</th>
                    <td>AED {{\Cart::subtotal()}}</td>
                </tr>
                <!-- <tr>
                    <th>Shipping</th>
                    <td>Not Calculated</td>
                </tr> -->
                <tr>
                    <th>Tax</th>
                    <td>AED {{\Cart::tax()}}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>AED {{\Cart::total()}}</td>
                </tr>
            </table>
        </div>
        <div class="dropcart__buttons">
            <a class="btn btn-secondary" href="{{URL::to('/cart')}}">View Cart</a>
            <a class="btn btn-primary" href="{{URL::to('/checkout')}}">Checkout</a>
        </div>
    @else
        <div class="dropcart__empty">Your shopping cart is empty!</div>
    @endif
</div>
<script>
    $(".indicator__value").html('{{\Cart::count()}}');
</script>