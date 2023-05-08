@extends('admin.layout')


@section('title')
    normal users
@endsection

@section('content')
<section class="accounts">

    <h1 class="heading">user accounts</h1>
 
    <div class="box-container">
    @if (count($users) > 0)
    @foreach ($users as $user)
    <div class="box">
        <p> user id : <span>{{$user->id}}</span> </p>
        <p> username : <span>{{$user->name}}</span> </p>
        <p> email : <span>{{$user->email}}</span> </p>
        <a href="{{url("admin/users/delete/$user->id")}}" onclick="return confirm('delete this account? the user related information will also be delete!')" class="delete-btn">delete</a>
     </div>
    @endforeach
        
    @else
    <p class="empty">no accounts available!</p>
    @endif
    </div>
 
 </section>
@endsection