<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
@include('admin.slider')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        
@include('admin.navbar')


        <!-- partial -->
@include('admin.body')
        <!-- content-wrapper ends -->
  
    <!-- container-scroller -->
    <!-- plugins:js -->

@include('admin.footer')

    <!-- End custom js for this page -->
  </body>
</html>