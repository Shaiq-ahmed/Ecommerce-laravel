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
    .div_center {
        text-align: center;
        padding-bottom: 40px;
        margin: auto;
        margin-top: 60px;
        width:80%;
    }



    .table {
        text-align: center;
        padding-bottom: 40px;
        margin: auto;
        width: 100%;
        color: black;
        border-collapse: collapse;
    }
    .checkout{
        padding-top: 40px;
        text-align: right;

    }

    /* tr:hover {background-color: crimson;} */
</style>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')


    <div class="div_center">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><b>Image<b></th>
                    <th scope="col"><b>Product Name<b></th>
                    <th scope="col"><b>Price<b></th>
                    <th scope="col"><b>Quantity<b></th>
                    <th scope="col"><b>Action<b></th>




                </tr>
            </thead>
            <tbody>

                <?php $totalprice =0;?>


                @foreach ($cart as $cart)
                    <tr>
                        <td><img src="{{ asset('/product') . '/' . $cart->image }}" alt="" style="width: 65px"></td>
                        <td>{{ $cart->product_title }}</td>
                        <td>{{ $cart->price }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td><a href="{{url('/remove_cartproduct', $cart->id)}}" onclick="return confirm('delete this product from cart?')" class="btn btn-danger">Delete</a></td>


                    </tr>
                    <?php $totalprice += $cart->price;?>

                @endforeach
            </tbody>


        </table>

        <div class="checkout">
            <h3 style="font-size: 25px">Total price : <span class="badge badge-info"> <?php echo($totalprice);?></span></h3>
            <br>
            <a href="{{url('/checkout')}}" class="btn btn-outline-dark btn-lg">Checkout</a>
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
