@extends('admin.layout')

@section('title')
    all admins
@endsection

@section('content')
<section class="accounts">

    <h1 class="heading">admin accounts</h1>
 
    <div class="box-container">
 
    <div class="box">
       <p>add new admin</p>
       <a href="{{url("admin/register")}}" class="option-btn">register admin</a>
    </div>
    @if (count($admins) > 0)
    @foreach ($admins as $admin)
    <div class="box">
        <p> admin id : <span>{{$admin->id}}</span> </p>
        <p> admin name : <span>{{$admin->name}}</span> </p>
        <div class="flex-btn">
           <a href="{{url("admin/delete/$admin->id")}}" onclick="return confirm('delete this account?')" class="delete-btn">delete</a>
           @if (Auth::user()->password == $admin->password)
           <a href="{{url("admin/update/$admin->id")}}" class="option-btn">update</a>
           @endif
        </div>
     </div>
    @endforeach
    
    @else
    <p class="empty">no accounts available!</p>
    @endif
 
    </div>
 
 </section>
@endsection