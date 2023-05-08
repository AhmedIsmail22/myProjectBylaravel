@extends('admin.layout')

@section('title')
    Products Page
@endsection


@section('content')
 
 <section class="show-products">
 
    <h1 class="heading">categories added</h1>
   
    <a href="{{url("admin/categories/add")}}" class="btn" id="btn-add" style="width: 250px; margin-bottom:20px">Add New Category</a>
    <div class="box-container">
 
        @if (count($categories) > 0)
        @foreach ($categories as $category)
        <div class="box" style="min-height:450px; max-height:450px; padding-bottom:0">
         <img src="{{asset("storage/$category->image")}}" alt="">
         <div class="name">{{$category->name}}</div>
         <div class="details"><span>{{$category->desc}}</span></div>
         <div class="flex-btn">
            <a href="{{url("admin/categories/update/$category->id")}}" class="option-btn">update</a>
            <a href="{{url("admin/categories/delete/$category->id")}}" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
         </div>
      </div>
        @endforeach
        @else
        <p class="empty">no categories added yet!</p>
        @endif
    </div>
 
 </section>
@endsection