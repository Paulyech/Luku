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
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
        @if (session()->has('message'))

         <div class="alert alert-success">

               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
               {{session()->get('message')}}
         </div>
       @endif
         <!-- end header section -->
         <table class="table table-striped">
            <tr>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php $totalprice=0; ?>

            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product_title}} </td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}} </td>
                <td style="width: 100px;">
                    <img src="{{ asset('storage/' . $cart->image) }}" alt="Product Image">

                </td>
                <td>
                    <a onclick="return confirm('Are you sure you want to remove')" class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
                </td>
            </tr>
            <?php $totalprice=$totalprice + $cart->price; ?>

            @endforeach

         </table>
         <div style="margin:auto;">
            <h1 style="padding: 40px;">Total:  {{$totalprice}}</h1>
           

         </div>

         <div style="margin: auto;">
            <h1>Proceed to Payment</h1>
            <a href="{{url('cash_order')}}" class="btn btn-success">cash on delivery</a>
            <a href="" class="btn btn-success">pay using card</a>
         </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
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