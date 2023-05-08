@extends('layout')


@section('title')
    Orders
@endsection


@section('content')

<section class="orders">

    <h1 class="heading">placed orders</h1>
<div class="box-container">
@if (count($orders) > 0)   
@foreach ($orders as $order)    
<div class="box">
    <p>placed on : <span> {{$order->created_at}}</span></p>
    <p>name : <span> {{Auth::user()->name}}</span></p>
    <p>email : <span> {{$order->email}}</span></p>
    <p>number : <span> {{$order->phone}}</span></p>
    <p>address : <span> {{$order->address}}</span></p>
    <p>payment method : <span> {{$order->payment}}</span></p>
    <p>your orders : <span> {{$order->total_products}}</span></p>
    <p>total price : <span>EGP {{$order->total_price}}/-</span></p>
    <p> payment status : <span style="color:<?php if($order->order == 'Pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $order->order; ?></span> </p>
 </div>
@endforeach 
@else
<p class="empty">no orders placed yet!</p>
@endif
</div>
</section>
@endsection