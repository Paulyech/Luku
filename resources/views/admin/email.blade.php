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
                    <h1 style="text-align: center;">Send Email to {{$order->email}}</h1>

                    <form action="{{url('send_user_email',$order->id)}}" method="POST" >
                      @csrf

                      <div>
                        <label for="greeting">Email Greetings:</label>
                        <input type="text"   name="greeting"  style="color: black;" >
                      </div>
                      
                      <div>
                        <label for="firstline">First Line:</label>
                        <input type="text"   name="firstline"  style="color: black;" >
                      </div>
                      
                      
                      <div>
                        <label for="body">Body</label>
                        <input type="text"   name="body"  style="color: black;">
                      </div>
                      <div>
                        <label for="button">Email Button</label>
                        <input type="text"   name="button"  style="color: black;">
                      </div>

                      <div>
                        <label for="url">Email Url</label>
                        <input type="text"   name="url"  style="color: black;">
                      </div>

                      <div>
                        <label for="lastline">Last Line</label>
                        <input type="text"   name="lastline"  style="color: black;">
                      </div>
                  
                      
                      <div>
                        <input type="submit" name="submit" value="Send Email" class="btn btn-primary">

                      </div>
                    </form>
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
