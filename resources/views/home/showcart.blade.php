<!DOCTYPE html>
<html>
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
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">

        .center{
            margin:auto;
           padding: 70px;
            text-align:center;
           
        }
        .td_dsign{
            font-size:30px;
            min-width: 200px;
        }
        .color_head{
            background-color:skyblue;
        }
        .img_size{
            height:100px;
            width:100px;
        }
        .total_design{
            font-size:20px;
            padding: 30px;
        }
      </style>
      
   </head>
   <body>
      
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         
         @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
              </div>
            @endif

         <!-- slider section -->
       
        <!-- end slider section -->
      
      <div class="center">
        <table class="table table-bordered modal-body center" id="dataTable" width="100%" cellspacing="0">
        <tr class="color_head tr">
          <td class="td_dsign">Product Title</td>
          <td class="td_dsign">Product Quantity</td>
          <td class="td_dsign">Price</td>
          <td class="td_dsign">Image</td>
          <td class="td_dsign">Action</td>
        </tr>

        <?php $totalprice=0; ?>

        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>₹{{$cart->price}}</td>
            <td> <img class="image-responsive img_size" src="/product/{{$cart->image}}" alt=""></td>
            <td> <a class="btn btn-danger" href="{{url('remove_cart',$cart->id)}}" onclick="return confirm('Are you sure to remove this product?')">Remove</a></td>

        </tr>
        <?php $totalprice=$totalprice+$cart->price ?>
        @endforeach
        </table>
        <div>
            <h1 class="total_design">Total Price : ₹{{$totalprice}}</h1>
        </div>

        <div>
            <h1 style="font-size: 25px; padding-bottom:15px">Proceed to Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">COD</a>
            <a href="{{url('stripe_payment',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>
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