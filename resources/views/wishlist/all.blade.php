@extends('layout')


@section('title')
    My Cart
@endsection

@section('content')
<section class="products shopping-cart">

    <h3 class="heading">your wishlist</h3>
 
    <div class="box-container">
        <?php
            $grandTotal = 0;    
        ?>
        @if (count($wishlists) > 0)   
            @foreach ($wishlists as $item) 
            <?php
                $image = $item->product->image_01;
                $id = $item->product->id;
                $grandTotal += $item->product->price;
            ?>  
            <form action="{{url("cart/add/$id")}}" method="POST" class="box">
                @csrf
                
                <input type="hidden" name="product_id" value="{{$id}}">
                <input type="hidden" name="quantity" value="1">
                @error('product_id')
                    <h1>{{$message}}</h1>
                @enderror
               <a href="{{url("product/show/$id")}}" class="fas fa-eye"></a>
               <img src="{{asset("storage/$image")}}" alt="">
               <div class="name">{{$item->product->name}}</div>
               <div class="flex">
                  <div class="price">${{$item->product->price}}/-</div>
               </div>
               <button class="btn" type="submit" >add to cart</button>
               <input formaction="{{url("wishlist/delete/$id")}}" type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="delete-btn" name="delete">
            </form>
            @endforeach 
        @else
        <p class="empty">your cart is empty</p>
        @endif
    </div>
 
    <div class="cart-total">
       <p>grand total : <span>${{$grandTotal}}/-</span></p>
       <a href="{{url("shop")}}" class="option-btn">continue shopping</a>
       <a href="{{url("wishlist/delete/all")}}" class="delete-btn <?= ($grandTotal > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a>
    </div>
 
 </section>
@endsection