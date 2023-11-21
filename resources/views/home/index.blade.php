<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>{{config('app.name', 'Luku')}}</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}} " />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}} " rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}} " rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}} " rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
        
      
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')

         <!-- end slider section -->
      </div>
      <!-- why section -->
       @include('home.why')

      <!-- end why section -->
      
      <!-- arrival section -->
       @include('home.arrivals')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.products')
      <!-- end product section -->

      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="text-white capitalize ml-2">
            copyright &copy;
            <script>
                document.write(new Date().getFullYear() );
            </script>
            |all rights reserved|designed by <span class="font-bold">paulyech</span> 
        </p>
      </div>

      <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>