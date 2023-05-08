@extends('admin.layout')


@section('title')
    Add category
@endsection


@section('content')
<section class="add-products">

    <h1 class="heading">add category</h1>
 
    <form action="{{url("admin/categories/add")}}" method="POST" enctype="multipart/form-data">
      @csrf
       <div class="flex">
          <div class="inputBox">
             <span>category name (required)</span>
             <input type="text" class="box" placeholder="enter category name" name="name" value="{{old("name")}}">
             @error('name')
                 <div id="error">{{$message}}</div>
             @enderror
          </div>
         <div class="inputBox">
            <span>product quantity (required)</span>
            <input type="number" min="0" class="box" placeholder="enter category quantity" name="num_of_products" value="{{old("num_of_products")}}">
            @error('num_of_products')
                 <div id="error">{{$message}}</div>
             @enderror
         </div>
         <div class="inputBox">
             <span>image (required)</span>
             <input type="file" name="image"  class="box" value="{{old("image")}}">
             @error('image')
                 <div id="error">{{$message}}</div>
             @enderror
         </div>
          <div class="inputBox">
             <span>category details (required)</span>
             <textarea name="desc" placeholder="enter category details" class="box" cols="30" rows="10">{{old("desc")}}</textarea>
             @error('desc')
             <div id="error">{{$message}}</div>
         @enderror
            </div>
       </div>
       <button type="submit" class="btn">add category</button>
    </form>
 
 </section>
@endsection