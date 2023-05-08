@extends('layout')


@section('title')
    register
@endsection


@section('content')
<section class="form-container">
    <form action="{{url("register")}}" method="POST">
        @csrf
       <h3>register now</h3>
       <input type="text" name="name"  placeholder="enter your username" value="{{old("name")}}" class="box">
       @error('name')
                 <div id="error">{{$message}}</div>
        @enderror
       <input type="email" name="email"  placeholder="enter your email" value="{{old("email")}}" class="box" >
       @error('email')
                 <div id="error">{{$message}}</div>
        @enderror
       <input type="password" name="password"  placeholder="enter your password"   class="box" >
       @error('password')
                 <div id="error">{{$message}}</div>
        @enderror
       <button class="btn" type="submit">register now</button>
       <p>already have an account?</p>
       <a href="{{url("login")}}" class="option-btn">login now</a>
    </form>
 </section>
@endsection