<!DOCTYPE html>
<html>
    <base href="/public">
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
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>MatelHolic E-Commerce Store</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <link href="home/css/style1.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      
         
    <!-- ------------ Single product details---------- -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
            <img src="product/{{$product->image}}" alt="">

                
            </div>
            <div class="col-2">
                <p style=" font-weight: bold;">Product Catagory: {{$product->category}}</p>
                <h1 style=" font-weight: bold;font-size:30px">Title: {{$product->title}} </h1>
                @if($product->discount_price!=null)
                        <h4  style="color: red">
                        Discount Price: ₹{{$product->discount_price}}
                        </h4>
                        
                        <h5 style="text-decoration: line-through; color:blue;">
                        Price: ₹{{$product->price}}
                        </h5>

                        @else
                        <h5 style="color:blue">
                        Price <br>
                        ₹{{$product->price}}
                        </h5>

                        @endif
               
                </select>
                <form action="{{url('add_cart',$product->id)}}" method="POST">

                          @csrf
                           <div class="row">
                              <div class="col-md-1 p-1" style="width:30px">

                              <input  type="number" name="quantity" value="1" min="1">
                              </div>
                              <div class="col-md-9">

                              <input type="submit" value="Add To Cart">
                              </div>
                           
                           
                           </div>
                           
                          </form>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>{{$product->description}}</p>
            </div>
        </div>
    </div>
    </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://www.linkedin.com/in/dhritiman-nath-5a5873204/">From666</a><br>
         
            Distributed By <a href="https://github.com/devilseye-from666" target="_blank">Devil</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>