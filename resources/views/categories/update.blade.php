@extends('admin.layout')


@section('title')
    update category page
@endsection


@section('content')
<section class="update-product">

    <h1 class="heading">update Category</h1>
 
    @if ($category)
    <form action="{{url("admin/categories/update/$category->id")}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="image-container">
          <div class="main-image">
             <img src="{{asset("storage/$category->image")}}" alt="">
          </div>
       </div>
       <span>update name</span>
       <input type="text" name="name"  class="box" maxlength="100" placeholder="enter product name" value="{{$category->name}}">
       @error('name')
             <div id="error">{{$message}}</div>
         @enderror
       <span>update description</span>
       <textarea name="desc" class="box" cols="30" rows="10">{{$category->desc}}</textarea>
       @error('desc')
             <div id="error">{{$message}}</div>
         @enderror
       <span>update image</span>
       <input type="file" name="image" class="box">
       @error('image')
             <div id="error">{{$message}}</div>
         @enderror
       <div class="flex-btn">
        <button type="submit" class="btn">update</button>
          <a href="{{url("admin/categories")}}" class="option-btn">go back</a>
       </div>
    </form>

    @else
        
    <p class="empty">no categories found!</p>
    @endif
 </section>
 
 
@endsection