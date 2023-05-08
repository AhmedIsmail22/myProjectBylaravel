@extends('layout')


@section('title')
    Profile
@endsection


@section('content')
    <section class="form-container">

        <form action="{{url("profile/update")}}" method="POST">
            @csrf
           <h3>update now</h3>
           <input type="text" name="name" placeholder="enter your username"  class="box" value=" {{Auth::user()->name}}">
            @error('name')
                <div id="error">{{$message}}</div>
            @enderror
           <input type="email" name="email" placeholder="enter your email"  class="box" value=" {{Auth::user()->email}}">
           @error('email')
                <div id="error">{{$message}}</div>
            @enderror
            <input type="password" name="password" placeholder="enter your old password"  class="box">
            @error('password')
                <div id="error">{{$message}}</div>
            @enderror
            <input type="password" name="new_pass" placeholder="enter your new password"  class="box">
            @error('new_pass')
                <div id="error">{{$message}}</div>
            @enderror
            <button type="submit" class="btn">update now</button>
        </form> 

     
     </section>
     

     
@endsection