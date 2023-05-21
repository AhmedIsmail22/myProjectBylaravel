@extends('layout')


@section('title')
    search
@endsection


@section('content')
    
<section class="search-form">
    <form action="{{url("search")}}" method="POST">
        @csrf
       <input type="text" name="search_key" placeholder="search here..." class="box" value="{{old("search_key")}}">
       <button type="submit" class="fas fa-search" name="search_btn"></button>
    </form>
    @error('search_key')
            <div id="error">{{$message}}</div>
        @enderror
 </section>

 <section class="products" style="padding-top: 0; min-height:100vh;">

    <div class="box-container">
    @if (count($products) > 0)
    @foreach ($products as $product)
    <form action="" method="post" class="box">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <button formaction="{{url("wishlist/add/$product->id")}}" class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
        <a href="{{url("product/show/$product->id")}}" class="fas fa-eye"></a>
        <img src="{{asset("storage/$product->image_01")}}" alt="">
        <div class="name">{{$product->name}}</div>
        <div class="flex">
           <div class="price"><span>${{$product->price}}<span>/-</span></div>
           <input type="number" name="quantity" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
        </div>
        <input type="submit" value="add to cart" class="btn" name="add_to_cart">
     </form> 
    @endforeach

    @else

    <p class="empty">no products found!</p>
    
    @endif
    
 
    </div>
 
 </section>
@endsection