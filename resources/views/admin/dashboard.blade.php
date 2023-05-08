@extends('admin.layout')


@section('title')
    Dashboard Page
@endsection

@section('content')
<section class="dashboard">

    <h1 class="heading">dashboard</h1>
 
    <div class="box-container">
 
       <div class="box">
          <h3>welcome!</h3> 
          <a href="{{url("profile/updateForm")}}" class="btn">update profile</a>
       </div>
 
       {{-- <div class="box">
          <h3><span>$</span> {{$pendingOrderTotal}} <span>/-</span></h3>
          <p>total pendings</p>
          <a href="placed_orders.php" class="btn">see orders</a>
       </div>
 
       <div class="box">
          <h3><span>$</span> {{$completedOrderTotal}} <span>/-</span></h3>
          <p>completed orders</p>
          <a href="placed_orders.php" class="btn">see orders</a>
       </div>
 
       <div class="box">
          <h3> <span>$</span> {{$canceledOrderTotal}} </h3>
          <p>orders placed</p>
          <a href="placed_orders.php" class="btn">see orders</a>
       </div> --}}
 
       <div class="box">
          <h3>{{$products}}</h3>
          <p>products added</p>
          <a href="{{url("admin/products")}}" class="btn">see products</a>
       </div>
 
       <div class="box">
          <h3> {{$users}} </h3>
          <p>normal users</p>
          <a href="{{url("admin/users")}}" class="btn">see users</a>
       </div>
 
       <div class="box">
          <h3> {{$admins}} </h3>
          <p>admin users</p>
          <a href="{{url("admin/admins")}}" class="btn">see admins</a>
       </div>
 
       <div class="box">
          <h3> {{$messages}} </h3>
          <p>new messages</p>
          <a href="{{url("admin/messages")}}" class="btn">see messages</a>
       </div>
 
    </div>
 
 </section>
@endsection