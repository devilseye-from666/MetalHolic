<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <h2 class="font_size">All Products</h2>
      <table class="table table-bordered modal-body center" id="dataTable" width="100%" cellspacing="0">
        <div class="table-responsive">
      <tr class="color_head tr">
          <td>Name of the User</td>
          <td>Email</td>
          <td>Image</td>
          <td>Details Of Complaint</td>
         
        </tr>
        @foreach($complaint as $complaint)
        <tr class="tr">
          <td>{{$complaint->name}}</td>
          <td>{{$complaint->email}}</td>
         
          <td>
            <img class="img_size" src="/complaint/{{$complaint->image}}" alt="">
          </td>
          <td>{{$complaint->detailsofcomplaint}}</td>
        </tr>
        @endforeach
        </div>
     </table>
</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>