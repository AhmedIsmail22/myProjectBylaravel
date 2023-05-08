@extends('admin.layout')

@section('title')
    Products Page
@endsection


@section('content')
 
 <section class="show-products">
 
    <h1 class="heading">products added</h1>
   
    <a href="{{url("admin/products/add")}}" class="btn" id="btn-add" style="width: 200px; margin-bottom:100px">Add New Product</a>
    <div class="box-container">
 
        @if (count($products) > 0)
        @foreach ($products as $product)
          <div class="box" style="max-height:520px; min-height:520px;">
            <img src="{{asset("storage/$product->image_01")}}" alt="">
            <div class="name">{{$product->name}}</div>
            <div class="price">EGP<span>{{$product->price}}</span>/-</div>
            <div class="details"style="max-height:100px; overflow: hidden"><span>{{$product->details}}</span></div>
            <div class="flex-btn">
               <a href="{{url("admin/products/update/$product->id")}}" class="option-btn">update</a>
               <a href="{{url("admin/products/delete/$product->id")}}" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
            </div>
         </div>
         @endforeach
        @else
        <p class="empty">no products added yet!</p>
        @endif
    </div>
 
 </section>
@endsection