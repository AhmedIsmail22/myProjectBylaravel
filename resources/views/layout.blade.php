<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{asset("css/style1.css")}}">
</head>
<body>

   @if (session()->has("success"))
   <div class="message">
      <span>{{session()->get("success")}}</span>
      <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
   </div>
   @endif
   @error('product_id')
   <div class="message">
      <span>
         @if ($message == "The product id has already been taken.")
         already added to cart!
         @else
         {{$message}}
         @endif
         </span>
      <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
   </div>
   @enderror

    <header class="header">

        <section class="flex">
     
           <a href="{{url("home")}}" class="logo">Shopie<span>.</span></a>
     
           <nav class="navbar">
               <a href="{{url("home")}}">home</a>
               <a href="{{url("about")}}">about</a>
              <a href="{{url("orders")}}">orders</a>
              <a href="{{url("shop")}}">shop</a>
              <a href="{{url("contact")}}">contact</a>
           </nav>
     
           <div class="icons">
              <div id="menu-btn" class="fas fa-bars"></div>
              <a href="{{url("search")}}"><i class="fas fa-search"></i></a>
              <a href="{{url("wishlist/all")}}"><i class="fas fa-heart"></i><span>
               @auth
               ({{count(Auth::user()->wishlist)}})
               @endauth   
               @guest
               (0)
               @endguest
            </span></a>
              <a href="{{url("cart/all")}}"><i class="fas fa-shopping-cart"></i><span>
               @auth
               ({{count(Auth::user()->cart)}})
               @endauth   
               @guest
               (0)
               @endguest
            </span></a>
              <div id="user-btn" class="fas fa-user"></div>
           </div>
     
           <div class="profile">
              @auth
              <p>{{Auth::user()->name}}</p>
              <a href="{{url("profile/updateForm")}}" class="btn">update profile</a>
              <div class="flex-btn">
                 <a href="{{url("register")}}" class="option-btn">register</a>
                 <a href="{{url("login")}}" class="option-btn">login</a>
              </div>
              <a href="{{url("logout")}}" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
              
              @endauth
              @guest
              <p>please login or register first!</p>
              <div class="flex-btn">
                 <a href="{{url("register")}}" class="option-btn">register</a>
                 <a href="{{url("login")}}" class="option-btn">login</a>
              </div>
              @endguest     
              
              
           </div>
     
        </section>
     
     </header>
    @yield('content')
    <footer class="footer">

        <section class="grid">
     
           <div class="box">
              <h3>quick links</h3>
              <a href="{{url("home")}}"><i class="fas fa-angle-right"></i> home</a>
               <a href="{{url("about")}}"><i class="fas fa-angle-right"></i> about</a>
              <a href="{{url("shop")}}"><i class="fas fa-angle-right"></i> shop</a>
              <a href="{{url("contact")}}"><i class="fas fa-angle-right"></i> contact</a>
           </div>
     
           <div class="box">
              <h3>extra links</h3>
              <a href="{{url("login")}}"> <i class="fas fa-angle-right"></i> login</a>
              <a href="{{url("register")}}"> <i class="fas fa-angle-right"></i> register</a>
              <a href="{{url("cart/all")}}"> <i class="fas fa-angle-right"></i> cart</a>
              <a href="{{url("orders")}}"> <i class="fas fa-angle-right"></i> orders</a>
           </div>
     
           <div class="box">
              <h3>contact us</h3>
              <a href="tel:01006700673"><i class="fas fa-phone"></i> 01006700673</a>
              <a href="tel:01006700673"><i class="fas fa-phone"></i> 01006700673</a>
              <a href="ahmed@gmail.com"><i class="fas fa-envelope"></i> Ahmed@gmail.com</a>
              <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i> cairo, egypt - 2023 </a>
           </div>
     
           <div class="box">
              <h3>follow us</h3>
              <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
              <a href="#"><i class="fab fa-twitter"></i>twitter</a>
              <a href="#"><i class="fab fa-instagram"></i>instagram</a>
              <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
           </div>
     
        </section>
     
        <div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>eng. Ahmed Ismail</span> | all rights reserved!</div>
     
    </footer>
         
    <script src="{{asset("js/script.js")}}"></script>
</body>
</html>