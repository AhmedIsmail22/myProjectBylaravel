@extends('layout')



@section('title')
    Contact us
@endsection



@section('content')
<section class="contact">

    <form action="{{url("message/send")}}" method="POST">
        @csrf
       <h3>get in touch</h3>
       <input type="text" name="name" placeholder="enter your name" class="box" value="{{old("name")}}">
       @error('name')
           <div id="error">{{$message}}</div>
       @enderror
       <input type="email" name="email" placeholder="enter your email" class="box" value="{{old("email")}}">
       @error('email')
           <div id="error">{{$message}}</div>
       @enderror
       <input type="text" name="phone" placeholder="enter your number" class="box" value="{{old("phone")}}">
       @error('phone')
           <div id="error">{{$message}}</div>
       @enderror
       <textarea name="message" class="box" placeholder="enter your message" cols="30" rows="10">{{old("message")}}</textarea>
       @error('mesage')
           <div id="error">{{$message}}</div>
       @enderror
       <button class="btn" type="submit">send message</button>
    </form>
 
 </section>
@endsection