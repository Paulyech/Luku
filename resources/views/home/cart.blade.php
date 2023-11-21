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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
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
         <p class="text-white capitalize ml-2">
            copyright &copy;
            <script>
                document.write(new Date().getFullYear() );
            </script>
            |all rights reserved|designed by <span class="font-bold">paulyech</span> 
        </p>
      </div>

      





      <script>
            function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');  
            console.log(urlToRedirect); 
            swal({
                  title: "Are you sure to cancel this product",
                  text: "You will not be able to revert this!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
            })
            .then((willCancel) => {
                  if (willCancel) {


                     
                     window.location.href = urlToRedirect;
                     
                  }  


            });

            
         }
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