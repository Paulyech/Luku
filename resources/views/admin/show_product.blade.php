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
                        <table class="table table-striped">
                            <tr>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                
                            </tr>
                            @foreach ($product as $product)
                              <tr>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>  
                                  <img src="{{ asset('products/' . $product->image) }}" alt="">

                                </td>
                                <td><a onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" href="{{url('/delete_product',$product->id)}}">DELETE</a></td>
                                <td><a class="btn btn-info" href="{{url('edit_product',$product->id)}}">EDIT</a></td>
                              </tr>  

                            @endforeach
                            
        
                           
        
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
