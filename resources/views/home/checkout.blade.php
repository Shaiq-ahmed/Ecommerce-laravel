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
<style type="text/css">
    .heading{
        text-align: center;
        font-size: 40px;
        padding-bottom: 40px
    }
    .div_center {
        text-align: center;
        padding-bottom: 40px;
        margin: auto;
        margin-top: 60px;
        width:80%;
    }



    .head-item {
        font-size: 20px
    }
    .h4{
        font-size: 20px
    }
    .h3{
        font-size: 24px;

    }
    .border{
        background-color:  #DED3AC;
        border-radius: 10px;
        padding-top:30px;
        border: none;
        padding-bottom:30px;

    }
    .border0{
        background-color: black;
        border-radius: 10px;
        padding-top:30px;
        color: rgb(177, 174, 174);
        padding-left: 30px;
        padding-bottom:30px;


    }
    .border1{

        border-radius: 10px;
        padding-top:30px;
        padding-left: 160px;
        padding-bottom:30px;





    }
    .checkout{
        padding-top: 40px;
        text-align: right;
        padding-bottom:30px;

    }
/* .hero_area{
    background-color: #f5f5f5
} */

    /* tr:hover {background-color: crimson;} */
</style>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
                x
              </button>
            {{session()->get('message')}}
        </div>

    @endif

        <div class="container" >
            <h3 class="heading">Checkout</h3>


            <div class="row">
                <div class="col-md-4 border0">
                    <h4 class="h4"><b> Deliver To : </b>{{$user->name}}</h4>
                    <hr>
                    <h4 class="h4"><b> Address :</b>{{$user->address}}</h4>
                    <hr>
                    <h4 class="h4"><b> Email : </b>{{$user->email}}</h4>
                </div>
                <div class="col-md-4 border1">
                    <?php $totalprice =0;?>
                    @foreach ($cart as  $cart)
                    <img src="{{asset('/product').'/'.$cart->image}}" alt="" style="width: 150px">
                    <h5 class="head-item"><b>{{$cart->product_title}}</b></h5>
                    <h5 class="head-item">Rs. <b style="color: crimson"> {{$cart->price}}</b></h5>
                    <h5 class="head-item">Qty: {{$cart->quantity}}</h5>
                    <?php $totalprice += $cart->price;?>
                    @endforeach

                </div>
                <div class="col-md-4 border">
                    <h4 class="h3"><b> Order Summary </b></h4>
                    <h5  class="head-item"><b>Items Total : </b>  <span style="color: crimson"> Rs. <?php echo($totalprice);?></span></h5>

                    <h5  class="head-item"><b>Delivery Fee :</b> Rs. 120</h5>

                    <h5  class="head-item"><b>Total Payment :</b> <span style="color: crimson">  Rs. {{$totalprice + 120}}</span></h5>
                </div>

            </div>
            <div class="checkout">
                <h4>Place Order</h4>
                <a href="{{url('/cash_order')}}" class="btn btn-danger ">Cash On Delivery</a>
                <a href="{{url('/placeorder')}}" class="btn btn-danger ">Payment Using Card</a>
            </div>
        </div>



    </div>






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
