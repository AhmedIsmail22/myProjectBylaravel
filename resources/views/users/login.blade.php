@extends('layout')


@section('title')
    Login
@endsection

@section('content')
<section class="form-container">

    <form action="{{url("login")}}" method="POST">
        @csrf
        <h3>login now</h3>
        @if ($error)
           <div id="error">{{$error}}</div>
           @endif
       <input type="email" name="email" placeholder="enter your email"  class="box">
       @error('email')
       <div id="error">{{$message}}</div>
        @enderror
       <input type="password" name="password" placeholder="enter your password"  class="box">
       @error('password')
       <div id="error">{{$message}}</div>
        @enderror
       <input type="submit" value="login now" class="btn" name="submit">
       <p>don't have an account?</p>
       <a href="{{url("register")}}" class="option-btn">register now</a>
    </form>
 
 </section>
 
@endsection