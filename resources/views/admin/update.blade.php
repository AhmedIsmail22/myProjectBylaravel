@extends('admin.layout')

@section('title')
    update admin
@endsection

@section('content')
<section class="form-container">

    <form action="{{url("admin/update/$admin->id")}}" method="POST">
        @csrf
       <h3>update profile</h3>
       <input type="text" name="name" value="{{$admin->name}}" required placeholder="enter your username"   class="box">
        @error('name')
            <div id="error">{{$message}}</div>
        @enderror
       <input type="password" name="password" placeholder="enter old password"   class="box">
       @error('password')
            <div id="error">{{$message}}</div>
        @enderror
       <input type="password" name="newPassword" placeholder="enter new password"   class="box">
       @error('newPassword')
            <div id="error">{{$message}}</div>
        @enderror
       <button class="btn" type="submit" >Update</button>
    </form>
 
 </section>
@endsection