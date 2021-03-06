@extends('layouts.app')

@section('title', '800Benaa | Cart')

@section('content')
<div class="page-header">
    <div class="page-header__container container" style="background-color: #fff;">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{URL('/')}}">Home</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="{{asset('public/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div>
        <div class="page-header__title">
            <h1>Shopping Cart</h1>
        </div>
    </div>
</div>
<div class="cart block">
    <div class="container" style="background-color: #fff;">
        @if(count(\Cart::content()) > 0)
            <form action="{{URL::to('/updatecart')}}" method="POST">
                @csrf
                <table class="cart__table cart-table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Image</th>
                            <th class="cart-table__column cart-table__column--product">Product</th>
                            <th class="cart-table__column cart-table__column--price">Price</th>
                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                            <th class="cart-table__column cart-table__column--total">Total</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">
                        @foreach(\Cart::content() as $item)
                            <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image">
                                    <div class="product-image">
                                        <a href="{{$item->options->link}}" class="product-image__body">
                                            <img class="product-image__img" src="{{$item->options->image}}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--product">
                                    <a href="{{$item->options->link}}" class="cart-table__product-name">{{$item->name}}</a>

                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">{{$item->price}}</td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                        <input class="form-control input-number__input" type="number" min="1" value="{{$item->qty}}" name="{{$item->rowId}}">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">{{$item->subtotal()}}</td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <a href="#" class="btn btn-danger btn-sm clearItemCartPage" data-row-id="{{$item->rowId}}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="cart__actions">
                    <div class="cart__coupon-form">
                        <a href="{{URL('/shop')}}" class="btn btn-light">Continue Shopping</a>
                    </div>
                    <div class="cart__buttons">
                        <button type="submit" name="submit" value="clear" onclick="return confirm('Do you really want to clear the cart?')" class="btn btn-light">Clear</a>
                        <button type="submit" name="submit" value="update" class="btn btn-primary cart__update-button">Update Cart</button>
                    </div>
                </div>
                <div class="row justify-content-end pt-5">
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Cart Totals</h3>
                                <table class="cart__totals">
                                    <thead class="cart__totals-header">
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>AED {{\Cart::subtotal()}}</td>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__totals-body">
                                        <!-- <tr>
                                            <th>Shipping</th>
                                            <td>
                                                $25.00
                                                <div class="cart__calc-shipping"><a href="#">Calculate Shipping</a></div>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <th>Tax</th>
                                            <td>AED {{\Cart::tax()}}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="cart__totals-footer">
                                        <tr>
                                            <th>Total</th>
                                            <td>AED {{\Cart::total()}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a class="btn btn-primary btn-xl btn-block cart__checkout-button" href="{{URL::to('/checkout')}}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <div class="block-empty__body"><div class="block-empty__message">Your shopping cart is empty!</div><div class="block-empty__actions"><a class="btn btn-primary btn-sm" href="{{URL('/shop')}}">Continue</a></div></div>
        @endif
    </div>
</div>

@endsection
