@extends('layout')



@section('title')
    Shop
@endsection



@section('content')
<section class="products">

    <h1 class="heading">latest products</h1>
 
    <div class="box-container">
 
    
        @if (count($products) > 0)    
        @foreach ($products as $product)    
        <form action="{{url("cart/add/$product->id")}}" method="POST" class="box">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <button formaction="{{url("wishlist/add/$product->id")}}" class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
            <a href="{{url("product/show/$product->id")}}" class="fas fa-eye"></a>
            <img src="{{asset("storage/$product->image_01")}}" alt="">
            <div class="name">{{$product->name}}</div>
            <div class="flex">
               <div class="price"><span>EGP</span>{{$product->price}}<span>/-</span></div>
               <input type="number" name="quantity" class="qty" min="1" max="{{$product->quantity}}" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <button class="btn" type="submit">add to cart</button>
         </form>
        @endforeach
        @else
        <p class="empty">no products added yet!</p>
        @endif
 
    </div>
 
 </section>
@endsection