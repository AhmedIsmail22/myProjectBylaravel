@extends('layout')


@section('title')
    Checkout
@endsection


@section('content')
<section class="checkout-orders">

   
    <form action="{{url("order/add")}}" method="POST">
      @csrf
      
    <h3>your orders</h3>
      <div class="display-orders">
         <?php
            $grand_total = 0;
            $totalProducts = "";  
         ?>
         @if (count($carts) > 0)
       @foreach ($carts as $cart)    
          <?php
             $name = $cart->product->name;
             $price = $cart->product->price;
             $totalProducts .= "$name($price x $cart->quantity)"; 
          ?>
       <p> {{$cart->product->name}} <span>({{$cart->product->price}}/- x{{ $cart->quantity}})</span> </p>
           <?php $grand_total += $cart->product->price * $cart->product->quantity?>
       @endforeach
      
       @else
       <p class="empty">your cart is empty!</p>
       @endif
       <div class="grand-total">grand total : <span>EGP{{$grand_total}}/-</span></div>
              <input type="hidden" name="total_price" value="{{$grand_total}}">
              <input type="hidden" name="total_products" value="{{$totalProducts}}">
              <input type="hidden" name="number" value="111">
           </div>
     
           <h3>place your orders</h3>
     
           <div class="flex">
              <div class="inputBox">
                 <span>your name :</span>
                 <input type="text" name="name" placeholder="enter your name" class="box"  value="{{old("name")}}">
                 @error('name')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>your number :</span>
                 <input type="number" name="phone" placeholder="enter your number" class="box"  value="{{old("phone")}}">
                 @error('phone')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>your email :</span>
                 <input type="email" name="email" placeholder="enter your email" class="box"  value="{{old("email")}}">
                 @error('email')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>payment method :</span>
                 <select name="payment" class="box" value="{{old("payment")}}">
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paytm">paytm</option>
                    <option value="paypal">paypal</option>
                 </select>
                 @error('payment')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>address line 01 :</span>
                 <input type="text" name="flat" placeholder="e.g. flat number" class="box" value="{{old("flat")}}">
                 @error('flat')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>address line 02 :</span>
                 <input type="text" name="street" placeholder="e.g. street name" class="box" value="{{old("street")}}">
                 @error('street')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>city :</span>
                 <input type="text" name="city" placeholder="e.g. mumbai" class="box" value="{{old("city")}}">
                 @error('city')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>state :</span>
                 <input type="text" name="state" placeholder="e.g. maharashtra" class="box" value="{{old("state")}}">
                 @error('state')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>country :</span>
                 <input type="text" name="country" placeholder="e.g. India" class="box" value="{{old("country")}}">
                 @error('country')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
              <div class="inputBox">
                 <span>pin code :</span>
                 <input type="number" min="0" name="code" placeholder="e.g. 123456" class="box" value="{{old("code")}}">
                 @error('code')
                     <div id="error">{{$message}}</div>
                 @enderror
              </div>
           </div>
     
           <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">
     
        </form>
 
 </section>
@endsection