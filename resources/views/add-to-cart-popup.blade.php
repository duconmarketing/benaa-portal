<style>  
.table-image thead td, th {
      border: 0;
      color: #666;
      font-size: 0.8rem;
  }
  
  td, th {
    vertical-align: middle !important;
    text-align: center;        
  }
  td, th &.qty {
      max-width: 2rem;
    }

.price {
  margin-left: 1rem;
}

.modal-footer {
  padding-top: 0rem;
}
</style>

<div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">
          Your Shopping Cart
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(count(\Cart::content()) > 0)
          <table class="table table-image">
            <thead>
              <tr>
                <th scope="col" class="d-none d-sm-table-cell"></th>
                <th scope="col">Product</th>
                <th scope="col" class="d-none d-sm-table-cell">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(\Cart::content() as $items)
                <tr>
                  <td style="width:15%" class="d-none d-sm-table-cell">
                    <img src="{{$items->options->image}}" class="img-fluid img-thumbnail w-100" alt="Sheep">
                  </td>
                  <td>{{ucwords(strtolower($items->name))}}</td>
                  <td class="d-none d-sm-table-cell">{{$items->price}}</td>
                  <td>
                    <div class="input-number product__quantity">
                      <input type="number" value="{{$items->qty}}" min="1" class="input-number__input form-control updateItemPopup" data-row-id="{{$items->rowId}}">
                      <div class="input-number__add"></div>
                      <div class="input-number__sub"></div>
                    </div>
                  </td>
                  <td>{{$items->subtotal()}}</td>
                  <td>
                    <a href="#" class="btn btn-danger btn-sm clearItemPopup" data-row-id="{{$items->rowId}}">
                      <i class="fa fa-times"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table> 
          <div class="d-flex justify-content-end">
            <h5>Total: <span class="price text-dark">AED {{\Cart::subtotal()}}</span></h5>
          </div>
        @else
        <h5 class="text-center">Cart is empty!</h5>
        @endif
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
        @if(count(\Cart::content()) > 0)
          <a class="btn btn-primary cart__checkout-button" href="{{URL::to('/checkout')}}">Checkout</button>
        @endif
      </div>