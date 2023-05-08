@extends('admin.layout')

@section('title')
    add product
@endsection


@section('content')
<section class="add-products">

    <h1 class="heading">add product</h1>
 
    <form action="{{url("admin/products/add")}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="flex">
          <div class="inputBox">
             <span>product name (required)</span>
             <input class="box"placeholder="enter product name" name="name" value="{{old("name")}}">
             @error('name')
             <div id="error">{{$message}}</div>
         @enderror
            </div>
          <div class="inputBox">
            <span>product quantity (required)</span>
            <input type="number" class="box" placeholder="enter product quantity" name="quantity" value="{{old("quantity")}}">
            @error('quantity')
                 <div id="error">{{$message}}</div>
             @enderror
        </div>
         <div class="inputBox">
            <span>product category (required)</span>
                <select name="category_id" class="box" value="{{old("category")}}">
                <option value="">Choose Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                 <div id="error">{{$message}}</div>
             @enderror
        </div>
         <div class="inputBox">
            <span>product price (required)</span>
            <input type="text" class="box" placeholder="enter product price" name="price" value="{{old("price")}}">
            @error('price')
                 <div id="error">{{$message}}</div>
             @enderror
        </div>
         <div class="inputBox">
             <span>image 01 (required)</span>
             <input type="file" name="image_01" class="box" >
             @error('image_01')
             <div id="error">{{$message}}</div>
         @enderror
            </div>
         <div class="inputBox">
            <span>image 02 (required)</span>
            <input type="file" name="image_02" class="box" >
            @error('image_02')
                 <div id="error">{{$message}}</div>
             @enderror
        </div>
         <div class="inputBox">
             <span>image 03 (required)</span>
             <input type="file" name="image_03" class="box" >
             @error('image_03')
             <div id="error">{{$message}}</div>
         @enderror
         </div>
         <div class="inputBox">
             <span>product details (required)</span>
             <textarea name="details" placeholder="enter product details" class="box"  maxlength="500" cols="30" rows="10">{{old("details")}}</textarea>
          </div>
          @error('details')
                 <div id="error">{{$message}}</div>
             @enderror
        </div>
       
       <input type="submit" value="add product" class="btn" name="add_product">
    </form>
 
 </section>
@endsection