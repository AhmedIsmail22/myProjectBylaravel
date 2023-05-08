@extends('layout')


@section('title')
    My Cart
@endsection

@section('content')
<section class="products shopping-cart">

    <h3 class="heading">shopping cart</h3>
 
    <div class="box-container">
        <?php
            $grandTotal = 0;    
        ?>
        @if (count($carts) > 0)   
            @foreach ($carts as $cart) 
            <?php
                $image = $cart->product->image_01;
                $id = $cart->product->id;
                $grandTotal += $cart->product->price * $cart->quantity;
            ?>  
            <form action="{{url("cart/delete/$cart->id")}}" method="POST" class="box">
                @csrf
                {{-- @method('DELETE') --}}
               <a href="{{url("product/show/$id")}}" class="fas fa-eye"></a>
               <img src="{{asset("storage/$image")}}" alt="">
               <div class="name">{{$cart->product->name}}</div>
               <div class="flex">
                  <div class="price">EGP{{$cart->product->price}}/-</div>
                  <input type="number" name="quantity" class="qty" value="{{$cart->quantity}}">
                  <button formaction="{{url("cart/update/$cart->id")}}" type="submit" class="fas fa-edit"></button>
               </div>
               <div class="sub-total"> sub total : <span>EGP{{$cart->product->price * $cart->quantity}}/-</span> </div>
               <input type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="delete-btn" name="delete">
            </form>
            @endforeach 
        @else
        <p class="empty">your cart is empty</p>
        @endif
    </div>
 
    <div class="cart-total">
       <p>grand total : <span>EGP{{$grandTotal}}/-</span></p>
       <a href="{{url("shop")}}" class="option-btn">continue shopping</a>
       <a href="{{url("cart/delete/all")}}" class="delete-btn <?= ($grandTotal > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a>
       <a href="{{url("order/checkout")}}" class="btn <?= ($grandTotal > 1)?'':'disabled'; ?>">proceed to checkout</a>
    </div>
 
 </section>
@endsection