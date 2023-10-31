<!DOCTYPE html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Corona Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
        <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="admin/assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
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
                    <h2>Add Product</h2>

                    <form action="{{url("add_product")}}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div>
                        <label for="title">Product Title:</label>
                        <input type="text"  placeholder="product name" name="title"  style="color: black;" required="">
                      </div>
                      
                      <div>
                        <label for="description">Description:</label>
                        <input type="text"  placeholder="product description" name="description"  style="color: black;" required="">
                      </div>
                      
                      <div>
                        <label for="category">Category:</label>
                        <select name="category" required=""  style="color: black;">
                            <option value="" selected="" style="color: black;">Add Category here</option>

                            @foreach ($category as $category)
                            <option value="{{$category->category_name}}" style="color: black;" >{{$category->category_name}} </option>

                            @endforeach
                        </select>
                      </div>
                      
                      <div>
                        <label for="Price">Price</label>
                        <input type="number"  placeholder="product Price" name="price"  style="color: black;">
                      </div>
                      
                      <div>
                        <label for="Discount Price">Discount Price:</label>
                        <input type="number"  placeholder="Discount Price" name="discount_price"  style="color: black;">
                      </div>
                      
                      <div>
                        <label for="quantity">Quantity:</label>
                        <input type="number"  placeholder="product quantity" name="quantity"  style="color: black;" required="">
                      </div>
                      
                      <div>
                        <label for="image">Product Image</label>
                        <input type="file"   name="image" required="" >
                      </div>
                      
                      <div>
                        <input type="submit" name="submit" value="add product" class="btn btn-primary">

                      </div>
                    </form>
                  </div>

                 
                </div>
            </div>   
          <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
        <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="admin/assets/js/off-canvas.js"></script>
        <script src="admin/assets/js/hoverable-collapse.js"></script>
        <script src="admin/assets/js/misc.js"></script>
        <script src="admin/assets/js/settings.js"></script>
        <script src="admin/assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="admin/assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
      </body>
    </html>
