@extends('admin.layout')


@section('title')
    update product
@endsection

@section('content')
<section class="update-product">

    <h1 class="heading">update product</h1>
 
    
    <form action="{{url("admin/products/update/$product->id")}}" method="POST" enctype="multipart/form-data">
        @csrf   
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
       <span>update name</span>
       <input type="text" name="name"  class="box" placeholder="enter product name" value="{{$product->name}}">
       @error('name')
            <div id="error">{{$message}}</div>
       @enderror
       <span>update price</span>
       <input type="number" name="price" class="box" placeholder="enter product price" value="{{$product->price}}">
       @error('price')
            <div id="error">{{$message}}</div>
       @enderror
       <span>update quantity</span>
       <input type="number" name="quantity" class="box" placeholder="enter product price" value="{{$product->quantity}}">
       @error('quantity')
            <div id="error">{{$message}}</div>
       @enderror
       <span>update details</span>
       <textarea name="details" class="box" cols="30" rows="10">{{$product->details}}</textarea>
       @error('details')
            <div id="error">{{$message}}</div>
       @enderror
       <span>update image 01</span>
       <input type="file" name="image_01" class="box">
       @error('image_01')
            <div id="error">{{$message}}</div>
       @enderror
       <span>update image 02</span>
       <input type="file" name="image_02" class="box">
       @error('image_02')
            <div id="error">{{$message}}</div>
       @enderror
       <span>update image 03</span>
       <input type="file" name="image_03" class="box">
       @error('image_03')
            <div id="error">{{$message}}</div>
       @enderror
       <div class="flex-btn">
          <button class="btn" type="text">update</button>
          <a href="{{url("admin/products")}}" class="option-btn">go back</a>
       </div>
    </form>
    
 
 </section>
@endsection