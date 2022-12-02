<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')







          {{-- <div class="col-sm-6 col-md-4 col-lg-4">

          </div> --}}
          <div class="container">
            <div class="row" style="margin: auto;  padding:30px">
              <div class="col-sm col-md-5">
                <div class="box">

                    <div class="img-box">
                       <img src="{{asset('/product').'/'.$product->image}}" alt="">
                    </div>

                 </div>
              </div>
              <div class="col-sm col-md-7" style="padding-top: 50px">
                <div class="detail-box">
                    <h5>
                       {{$product->title}}
                    </h5>
                    @if ($product->discounted_price!=null)
                    <h6 style=" color: red">
                     Rs {{$product->price - $product->discounted_price}}
                  </h6>

                  <h6 style="text-decoration: line-through">
                     Rs {{$product->price}}
                  </h6>
                  @else

                      <h6>
                         Rs {{$product->price}}
                      </h6>



                    @endif

                      <h6><b>Product Description : </b> {{$product->description}}</h6>
                      <h6 ><b>Category : </b><span class="badge badge-success">{{$product->category}}</span></h6>
                      <h6><b>Available quantity :</b>{{$product->quantity}}</h6>
                      <a href="" class="btn btn-info"><i class="fa fa-cart-plus"></i> Add to Cart</a>


                 </div>
              </div>
            </div>
          </div>




      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="https://html.design/">BINGS BOO</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">BINGO</a>

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

