@extends('admin.layout')



@section('title')
    messages
@endsection

@section('content')
<section class="contacts">

    <h1 class="heading">messages</h1>
    
    <div class="box-container">
        @if (count($newMessages) > 0 || count($oldMessages) > 0)
        @foreach ($newMessages as $message)    
        <div class="box" style="position: relative">
            <p class="new" style="
                                    position: absolute;
                                    right: 0;
                                    top:-3px;
                                    padding:1px 15px;
                                    background-color: rgb(185, 165, 53);
                                    color: #fff;">
            new</p>
        <p> user id : <span>{{Auth::user()->id}}</span></p>
        <p> name : <span>{{$message->name}}<span></p>
        <p> email : <span>{{$message->email}}<span></p>
        <p> number : <span>{{$message->phone}}</span></p>
        <p> message : <span>{{$message->message}}</span></p>
        <a href="{{url("admin/message/delete/$message->id")}}" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>
        </div>
        @endforeach
        @foreach ($oldMessages as $message)    
        <div class="box">
            
        <p> user id : <span>{{Auth::user()->id}}</span></p>
        <p> name : <span>{{$message->name}}<span></p>
        <p> email : <span>{{$message->email}}<span></p>
        <p> number : <span>{{$message->phone}}</span></p>
        <p> message : <span>{{$message->message}}</span></p>
        <a href="{{url("admin/message/delete/$message->id")}}" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>
        </div>
        @endforeach
            
        @else
        <p class="empty">you have no messages</p>
        @endif
    
    </div>
    
    </section>
@endsection