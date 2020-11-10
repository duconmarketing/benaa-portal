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
                <th scope="col"></th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <!-- <th scope="col">Actions</th> -->
              </tr>
            </thead>
            <tbody>
              @foreach(\Cart::content() as $items)
                <tr>
                  <td style="width:15%">
                    <img src="{{$items->options->image}}" class="img-fluid img-thumbnail w-100" alt="Sheep">
                  </td>
                  <td>{{ucwords(strtolower($items->name))}}</td>
                  <td>{{$items->price}}</td>
                  <td class="qty">{{$items->qty}}</td>
                  <td>{{$items->subtotal()}}</td>
                  <!-- <td>
                    <a href="#" class="btn btn-danger btn-sm">
                      <i class="fa fa-times"></i>
                    </a>
                  </td> -->
                </tr>
              @endforeach
            </tbody>
          </table> 
          <div class="d-flex justify-content-end">
            <h5>Total: <span class="price text-dark">AED {{\Cart::subtotal()}}</span></h5>
          </div>
        @else
        <h5>Cart is empty!</h5>
        @endif
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
        <a class="btn btn-primary cart__checkout-button" href="{{URL::to('/checkout')}}">Checkout</button>
      </div>