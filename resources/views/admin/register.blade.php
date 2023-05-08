@extends('admin.layout')

@section('title')
    register Admin
@endsection

@section('content')
<section class="form-container">

    <form action="{{url("admin/register")}}" method="POST">
        @csrf
        <input type="hidden" name="role" value="admin" >
        {{-- <input type="hidden" name="email" value="admin@gmail.com" > --}}
       <h3>register now</h3>
       <input type="text" name="name"  placeholder="enter your username" class="box" value="{{old("name")}}">
       @error('name')
           <div id="error">{{$message}}</div>
       @enderror
       <input type="password" name="password"  placeholder="enter your password"   class="box" >
       @error('password')
           <div id="error">{{$message}}</div>
       @enderror
       <button class="btn" type="submit">register</button>
    </form>
 
 </section>
@endsection