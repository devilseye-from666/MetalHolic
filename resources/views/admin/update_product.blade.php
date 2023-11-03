<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
      .div_center{
        text-align:center;
        padding-top:40px;
      }
      .font_size{
        font-size:40px;
        padding-bottom:40px;
      }
      /* .input_color{
        color:black;
        padding-bottom:20px;
      } */

      .div_design{
        padding-bottom:25px;

      }
      .input_width{
        width:201px;
        
      }
    
      label{
        display: inline-block;
        width:200px;
      }
      .btn_submit:hover{
        background-color:green;
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
          <div class="card">
                  <div class="card-body">
                  @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
              </div>
            @endif

                  <div class="div_center">
                    <h1 class="font_size">Update Product</h1>

                    
                    <form class="row g-3" action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                       
                    @csrf
                  <div class="col-md-6 div_design">
                    <label class="form-label">Product Title </label>
                    <input style="color:black; font-weight:bold" class="form-control" type="text" name="title" placeholder="Write Product Title" class="input_color" required="" value="{{$product->title}}">
                  </div>
                  <div class="col-md-3 div_design ">
                    <label class="form-label">Product Catagory</label> <br>
                    <select style="color:black; font-weight:bold" class="input_color input_width" name="catagory" required="" class="form-select">
                    <option value="{{$product->category}}" selected=""> {{$product->category}} </option>
                         @foreach($catagory as $catagory)
                    <option style="font-weight:bold" value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="col-12 div_design">
                    <label class="form-label">Product Description </label>
                    
                    <input style="color:black; font-weight:bold;  height:100px" class="form-control" type="text" name="description" placeholder="Write Product Description" class="input_color" required="" value="{{$product->description}}">
                  </div>
                  <div class="col-md-6 div_design">
                
                    <label class="form-label">Product Price </label>
                  
                    <input style="color:black; font-weight:bold" class="form-control" type="number" name="product_price" placeholder="Price of Product" class="input_color" required="" value="{{$product->price}}">
                  </div>
                  <div class="col-md-6 div_design">
                    <label class="form-label">Discount Price</label>
                    <input style="color:black; font-weight:bold" class="form-control" type="number" name="discount_price" placeholder="Discount Price of Product" class="input_color"  value="{{$product->discount_price}}">
                  </div>
                  <div class="col-md-6 div_design">
                 
                    <label class="form-label">Product Quantity</label>
                    <input style="color:black; font-weight:bold" class="form-control" type="number" name="product_quantity" placeholder="Quantity of Product" min="0" class="input_color" required="" value="{{$product->quantity}}">
                  </div>
                  <div class="col-md-3 div_design ">
                    <label class="form-label">Current Product Image</label>
                    
                   <img style="height:100px; weight:80px; margin:auto;" class="img-responsive" src="/product/{{$product->image}}" alt="">
                
                  </div>

                  <div class="col-md-3 div_design ">
                    <label class="form-label">Change Product Image</label><br>
                    <input  type="file" style="border:2px solid white" name="product_image" placeholder="Select Image of Product" min="0" class="input_color input_width" >
                  </div>
                                 
                  <div class="col-12 div_design">
                   <input class="form-control btn_submit" type="submit" value="Update Product" class="btn btn-success">
                  </div>
           </form>
         </div>
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