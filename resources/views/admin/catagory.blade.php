<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')


    <style type="text/css">
         .div-center{
          text-align:center;
          padding-top: 40px;
         }
          .input_color{
            color:black;
          }
         .h2_font{
          font-size:40px;
          padding-bottom: 40px;
         }
         .center{
          margin:auto;
          width:50%;
          text-align:center;
          margin-top:30px;
         
         }
         .padding_delete{
          padding:5px;
         }
         .color_head{
          color:skyblue;
         }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      @include('admin.header')
        <!-- partial -->

       <!-- body partt -->
       <div class="main-panel">
          <div class="content-wrapper">
       
            @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
              </div>
            @endif
          <div class="div-center">
          <h2 class="h2_font">Add Catagory</h2>
            <form action="{{url('/add_catagory')}}" method="POST">

            @csrf
              <input type="text" name="catagory" placeholder="Write Catagory name" class="input_color">

              <input type="submit" class="btn btn-primary" name="submit" Value="Add Catagory">
              </form>

             </div>
             <div class="card-body">
        <div class="table-responsive">
             <table class="table table-bordered modal-body center" id="dataTable" width="100%" cellspacing="0">
              <tr class="color_head">
                <td >Catagory Name</td>
                <td>Action</td>
              </tr>
            @foreach($data as $data)
              <tr >
                <td >{{$data->catagory_name}}</td>
                <td class="padding_delete"><a class="btn btn-danger " href="{{url('delete_catagory',$data->id)}}" onclick="return confirm('Are you sure to delete {{$data->catagory_name}} from catagory list ?')">Delete</a></td>
              </tr>
              @endforeach
             </table>
             </div>
        </div>
             
             </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>