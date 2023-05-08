<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopie | @yield('title')</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="{{asset("css/admin_style1.css")}}">

</head>
<body>
    <header class="header">

        <section class="flex">
     
           <a href="../admin/dashboard.php" class="logo">Admin<span>Panel</span></a>
     
           <nav class="navbar">
              <a href="{{url("admin/dashboard")}}">home</a>
              <a href="{{url("admin/categories")}}">categories</a>
              <a href="{{url("admin/products")}}">products</a>
              <a href="{{url("admin/orders")}}">orders</a>
              <a href="{{url("admin/admins")}}">admins</a>
              <a href="{{url("admin/users")}}">users</a>
              <a href="{{url("admin/messages")}}">messages</a>
           </nav>
     
           <div class="icons">
              <div id="menu-btn" class="fas fa-bars"></div>
              <div id="user-btn" class="fas fa-user"></div>
           </div>
     
           <div class="profile">
              <p>Profile name</p>
              <a href="{{url("admin/profile")}}" class="btn">update profile</a>
              <div class="flex-btn">
                 <a href="{{url("admin/register")}}" class="option-btn">register</a>
                 <a href="{{url("admin/login")}}" class="option-btn">login</a>
              </div>
              <a href="{{url("logout")}}" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
           </div>
     
        </section>
     
     </header>
    @yield('content')


<script src="../js/admin_script.js"></script>
   
</body>
</html>