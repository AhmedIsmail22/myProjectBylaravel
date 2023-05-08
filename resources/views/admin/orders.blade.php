@extends('admin.layout')


@section('title')
    orders
@endsection


@section('content')
    {{-- admin --}}
<section class="orders">

    <h1 class="heading">placed orders</h1>
    
    <div class="box-container">

       @if (count($orders) > 0)
       @foreach ($orders as $order)
       <div class="box">
        <p>placed on : <span> {{$order->created_at}}</span></p>
  <p>name : <span> {{$order->user->name}}</span></p>
  <p>email : <span> {{$order->email}}</span></p>
  <p>number : <span> {{$order->phone}}</span></p>
  <p>address : <span> {{$order->address}}</span></p>
  <p>total products : <span> {{$order->total_products}}</span></p>
  <p>total price : <span>$ {{$order->total_price}}/-</span></p>
  <p>payment method : <span> {{$order->payment}}</span></p>
        <form action="{{url("admin/order/update/$order->id")}}" method="post">
           <input type="hidden" name="order_id" value="{{$order->id}}">
           <select name="payment_status" class="select">
              <option selected disabled>{{$order->payment}}</option>
              <option value="pending">pending</option>
              <option value="completed">completed</option>
           </select>
          <div class="flex-btn">
           <input type="submit" value="update" class="option-btn" name="update_payment">
           <a href="{{url("admin/order/delete/$order->id")}}" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
          </div>
        </form>
     </div>
       @endforeach
       @else
            <p class="empty">no orders placed yet!</p>
       @endif
    
    </div>
    
    </section>
@endsection