<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
<style type="text/css">
  .font_size{
    text-align:center;
    font-size:40px;
    padding-bottom:30px;
  }
  .img_size{
    height:150px;
    width:150px;
  }
  .color_head{
    
    color:skyblue;
  }
  .tr{
    text-align:center;
    
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
            <h2 class="font_size">All Products</h2>
      <table class="table table-bordered modal-body center" id="dataTable" width="100%" cellspacing="0">
        <tr class="color_head tr">
          <td>Title</td>
          <td>Details</td>
          <td>Catagory</td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Discount Price</td>
          <td>Product Image</td>
          <th colspan="2">Action</th>
        </tr>
        @foreach($product as $product)
        <tr class="tr">
          <td>{{$product->title}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->category}}</td>
          <td>{{$product->quantity}}</td>
          <td>{{$product->price}}</td>
          <td>{{$product->discount_price}}</td>
          <td>
            <img class="img_size" src="/product/{{$product->image}}" alt="">
          </td>
          <td>
            <a class="btn btn-danger" href="{{url('delete_product',$product->id)}}" onclick="return confirm('Are you sure to delete {{$product->title}} Product?')">Delete</a>
          </td>
          <td>
          <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
          </td>
        </tr>
        @endforeach
      </table>

</div>
</div>
        

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>