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
        
      <div class="container p-5">
  <div class="row mx-0 justify-content-center">
    <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0">
   
      <form
        method="POST"
        class="w-100 rounded p-4 border bg-white"
        action="{{url('/add_quary')}}"
        enctype="multipart/form-data"
      >
      @csrf
        <label class="d-block mb-4">
          <span class="d-block mb-2">Your name</span>
          <input
            name="name"
            type="text"
            class="form-control"
            placeholder=""
          />
        </label>

        <label class="d-block mb-4">
          <span class="d-block mb-2">Email address</span>
          <input
            name="email"
            type="email"
            class="form-control"
            placeholder="@example.com"
          />
        </label>

        

        <div class="mb-4">
          <label class="d-block mb-2">Screenshot</label>
          <div class="form-control h-auto">
            <input name="image" type="file" class="form-control-file" />
          </div>
        </div>

        <label class="d-block mb-4">
          <span class="d-block mb-2">What's wrong?</span>
          <textarea
            name="message"
            class="form-control"
            rows="3"
            placeholder="Please describe your problem"
          ></textarea>
        </label>

        <div class="mb-3">
          <button type="submit" class="btn btn-primary px-3" style="color:black;">Submit</button>
        </div>

        
      </form>
    </div>
  </div>
</div>

   
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