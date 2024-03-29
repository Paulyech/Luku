<!DOCTYPE html>
    <html lang="en">
      <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Luku Admin</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}} ">
      <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}} ">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css')}} ">
      <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}} ">
      <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css')}} ">
      <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}} ">
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <!-- endinject -->
      <!-- Layout styles -->
      <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}} ">
      <!-- End layout styles -->
      <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}} " />
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
        <div class="container-scroller">
          <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
          <!-- partial -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="div_center">
                      @if (session()->has('message'))

                      <div class="alert alert-success">

                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                          {{session()->get('message')}}
                      </div>
                     @endif
                     <div>
                        <form action="{{url('search')}}" method="GET">
                          @csrf
                            <input style="color: black;width:300px;" type="text" name="search" placeholder="Search">
                            <input type="submit" value="Search" class="btn btn-outline-primary">
                        </form>
                     </div>
                        <table class=" table-deg">
                            <tr style="background-color: blueviolet;">
                                <th class="table-th">Name</th>
                                <th class="table-th">Email</th>
                                <th class="table-th">Phone</th>
                                <th class="table-th">Address</th>
                                <th class="table-th">Product</th>
                                <th class="table-th">Price</th>
                                <th class="table-th">Quantity</th>
                                <th class="table-th">Image</th>
                                <th class="table-th">Payment status</th>
                                <th class="table-th">Delivery status</th>
                                {{-- <th class="table-th">Print</th> --}}
                                
                            </tr>
                            @forelse ($order as $order)
                              <tr>
                                <td>{{$order->name}}</td>
                                <td  class="table-th">{{$order->email}}</td>
                                <td class="table-th">{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->product_title}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>  
                                  <img src="{{ asset('storage/' . $order->image) }}" alt="Product Image">

                              </td>

                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->delivery_status}}</td>
                                

                            
                               
                                 @if ($order->delivery_status=='processing')
                                    <td class="table-th"><a onclick="return confirm('Are you sure the order is delivered')" class="btn btn-danger" href="{{url('/delivered_order',$order->id)}}">Delivered</a></td> 
                                    @else
                                      <td style="color: green;">delivered</td>
                                 @endif

                                 <td><a class="btn btn-secondary" href="{{url('print_pdf',$order->id)}}">Print PDF</a>
                                </td>

                                <td>
                                  <a class="btn btn-info" href="{{url('send_email',$order->id)}}">Send Email</a>
                                </td>
                                
                           

                                
                              </tr>  

                              @empty
                               <td colspan="16">
                                  <p>No Records Found</p>  
                              </td>   
                              

                            @endforelse
                            
        
                           
        
                          </table>
                       
                  </div>

                 
                </div>
            </div>   
          <!-- page-body-wrapper ends -->
        </div>
         <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}} "></script>
        <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}} "></script>
        <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}} "></script>
        <script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}} "></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('admin/assets/js/off-canvas.js')}} "></script>
        <script src="{{asset('admin/assets/js/hoverable-collapse.js')}} "></script>
        <script src="{{asset('admin/assets/js/misc.js')}}"></script>
        <script src="{{asset('admin/assets/js/settings.js')}}"></script>
        <script src="{{asset('admin/assets/js/todolist.js')}} "></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{asset('admin/assets/js/dashboard.js')}} "></script>
        <!-- End custom js for this page -->
      </body>
    </html>
