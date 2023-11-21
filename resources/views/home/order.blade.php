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
      <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        label{
            display: inline-block;
            width: 200px;

        }
        .table-deg{
            border: 2px solid white;
            width: 70%;
            margin: auto;
            text-align: center;
        }
        .table-th{
            padding: 10px;
        }
    </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                  @if (session()->has('message'))
        
                  <div class="alert alert-success">
        
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                      {{session()->get('message')}}
                  </div>
                 @endif
                
                    <table class=" table-deg">
                        <tr style="background-color: blueviolet;">
                            <th class="table-th">Product Title</th>
                            <th class="table-th">Quantity</th>
                            <th class="table-th">Price</th>
                            <th class="table-th">Image</th>
                            <th class="table-th">Payment status</th>
                            <th class="table-th">Delivery status</th>
                            <th class="table-th">Cancel Order</th>
                            
                        </tr>
                        @foreach ($order as $order)
                          <tr>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>  
                              <img width="80px" src="{{ asset('storage/' . $order->image) }}" alt="Product Image">
                            </td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                @if ($order->delivery_status == 'processing')
                                  <a onclick="return confirm('Are you sure you want to cancel order')" href="{{url('cancel_order',$order->id)}}" class="btn btn-danger">Cancel Order</a>
                                   
                                  @else
                                      
                                    <p style="color: brown;">Not allowed</p>
                                @endif
                            </td>
                           
                          </tr>  
        
                           
                          
        
                        @endforeach
                        
        
                       
        
                      </table>
                   
              </div>
            </div>
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

