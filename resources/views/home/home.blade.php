@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="home-bg">

        <section class="home">
        
           <div class="swiper home-slider">
           
           <div class="swiper-wrapper">
        
              <div class="swiper-slide slide">
                 <div class="image">
                    <img src="images/home-img-1.png" alt="">
                 </div>
                 <div class="content">
                    <span>upto 50% off</span>
                    <h3>latest smartphones</h3>
                    <a href="{{url("shop")}}" class="btn">shop now</a>
                 </div>
              </div>
        
              <div class="swiper-slide slide">
                 <div class="image">
                    <img src="images/home-img-2.png" alt="">
                 </div>
                 <div class="content">
                    <span>upto 50% off</span>
                    <h3>latest watches</h3>
                    <a href="{{url("shop")}}" class="btn">shop now</a>
                 </div>
              </div>
        
              <div class="swiper-slide slide">
                 <div class="image">
                    <img src="images/home-img-3.png" alt="">
                 </div>
                 <div class="content">
                    <span>upto 50% off</span>
                    <h3>latest headsets</h3>
                    <a href="{{url("shop")}}" class="btn">shop now</a>
                 </div>
              </div>
        
           </div>
        
              <div class="swiper-pagination"></div>
        
           </div>
        
        </section>
        
        </div>



        <section class="category">

            <h1 class="heading">shop by category</h1>
         
            <div class="swiper category-slider">
         
            <div class="swiper-wrapper">
               @foreach ($categories as $category)    
               <a href="category.php?category=laptop" class="swiper-slide slide" style="min-height:180px;">
                  <img src="{{asset("storage/$category->image")}}" alt="">
                  <h3>{{$category->name}}</h3>
               </a>
               @endforeach
            </div>
            <div class="swiper-pagination"></div>
            </div>
         </section>

         <section class="home-products">

            <h1 class="heading">latest products</h1>
         
            <div class="swiper products-slider">
         
            <div class="swiper-wrapper"> 
               @if (count($products) > 0)    
               @foreach ($products as $product)    
               <form action="{{url("cart/add/$product->id")}}" method="POST" class="swiper-slide slide">
                  @csrf
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                  <button class="fas fa-heart" type="submit" name="add_to_wishlist" formaction="{{url("wishlist/add/$product->id")}}"></button>
                  <a href="{{url("product/show/$product->id")}}" class="fas fa-eye"></a>
                  <img src="{{asset("storage/$product->image_01")}}" alt="">
                  <div class="name">{{$product->name}}</div>
                  <div class="flex">
                     <div class="price">{{$product->price}}<span>/-</span></div>
                     <input type="number" name="quantity" class="qty" min="1" max="{{$product->quantity}}" onkeypress="if(this.value.length == 2) return false;" value="1">
                  </div>
                  <button class="btn" type="submit">add to cart</button>
               </form>
               @endforeach
               @else
               <p class="empty">no products added yet!</p>
               @endif
         
            </div>
         
            <div class="swiper-pagination"></div>
         
            </div>
         
         </section>

         <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
         <script src="js/script.js"></script>

         <script>
         
         var swiper = new Swiper(".home-slider", {
            loop:true,
            spaceBetween: 20,
            pagination: {
               el: ".swiper-pagination",
               clickable:true,
             },
         });
         
          var swiper = new Swiper(".category-slider", {
            loop:true,
            spaceBetween: 20,
            pagination: {
               el: ".swiper-pagination",
               clickable:true,
            },
            breakpoints: {
               0: {
                  slidesPerView: 2,
                },
               650: {
                 slidesPerView: 3,
               },
               768: {
                 slidesPerView: 4,
               },
               1024: {
                 slidesPerView: 5,
               },
            },
         });
         
         var swiper = new Swiper(".products-slider", {
            loop:true,
            spaceBetween: 20,
            pagination: {
               el: ".swiper-pagination",
               clickable:true,
            },
            breakpoints: {
               550: {
                 slidesPerView: 2,
               },
               768: {
                 slidesPerView: 2,
               },
               1024: {
                 slidesPerView: 3,
               },
            },
         });
         
         </script>

   @endsection

   