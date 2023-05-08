@extends('layout')


@section('title')
    show product
@endsection

@section('content')
<section class="quick-view">

    <h1 class="heading">quick view</h1>

    @if ($product)
    <form action="{{url("cart/add/$product->id")}}" method="POST" class="box">
      @csrf
        <div class="row">
           <div class="image-container">
              <div class="main-image">
                 <img src="{{asset("storage/$product->image_01")}}" alt="">
              </div>
              <div class="sub-image">
                 <img src="{{asset("storage/$product->image_01")}}" alt="">
                 <img src="{{asset("storage/$product->image_02")}}" alt="">
                 <img src="{{asset("storage/$product->image_03")}}" alt="">
              </div>
           </div>
           <div class="content">
              <div class="name">{{$product->name}}</div>
              <div class="flex">
                 <div class="price"><span>EGP</span>{{$product->price}}<span>/-</span></div>
                 <input type="number" name="quantity" class="qty" min="1" max="99" value="1">
                 <input type="hidden" name="product_id" value="{{$product->id}}">
              </div>
              <div class="details">{{$product->details}}</div>
              <div class="flex-btn">
                 <button class="btn" type="submit">add tot card</button>
                 <button formaction="{{url("wishlist/add/$product->id")}}" class="option-btn" type="submit">add tot wishlist</button>
              </div>
           </div>
        </div>
     </form>
    @else
    <p class="empty">no products added yet!</p>
    @endif
    
 
 </section>
@endsection