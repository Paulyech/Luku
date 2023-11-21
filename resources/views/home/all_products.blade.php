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
         <section class="product_section layout_padding">
            <div class="container">
               <div class="heading_container heading_center">
                  
                  <div>
                    <form action="{{url('all_product_search')}}" method="GET" >
                       @csrf
                         <input style="color: black;width:500px;" type="text" name="search" placeholder="Search">
                         <input type="submit" value="Search" class="btn btn-outline-primary">
                    
                     
                     </button>
                    </form>
                    @if (session()->has('message'))

                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                  </div>
               </div>
               
               <div class="row">
        
                 @foreach ($products as $product)
                    
                  <div class="col-sm-6 col-md-4 col-lg-4">
                     <div class="box">
                        <div class="option_container">
                           <div class="options">
                              <a href="{{url('details_product', $product->id)}}" class="option1">
                                View Details
                             </a>
                             <form  action="{{url('add_cart',$product->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                   <div class="col-md-4">
                                      <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                   </div>
                                   <div class="col-md-4">
                                      <input type="submit" value="Add to Cart">
                                   </div>
                                </div>
                             
                             </form>
                           </div>
                        </div>
                        <div class="img-box">
                           <img src="{{ asset('storage/' . $product->image) }}" alt="">
                        </div>
                        {{-- <div class="detail-box"> --}}
                           <h5>
                              {{$product->title}}
                           </h5>
        
                           @if ($product->discount_price !=null)
                             <h6 style="color: red;">
                               $ {{$product->discount_price}}
                             </h6>
        
                             <h6 style="text-decoration: line-through;color:blue;">
                                ${{$product->price}}
                             </h6>
        
                            
                                 
                             @else
                             <h6>
                               ${{$product->price}}
                             </h6>
                            
                           @endif
                           
                           
                        
                     </div>
                  </div>
                  @endforeach
        
        
                  </div>
                  <span>
                    {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
        
                  </span>
               </div>
               
           
         </section>

       
      </div>
      
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