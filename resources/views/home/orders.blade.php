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
        width: 80%;
        overflow-x: auto
    }



    .table {
        text-align: center;
        padding-bottom: 40px;
        margin: auto;
        width: 100%;
        color: black;
        border-collapse: collapse;
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
                        <th scope="col"><b>Product Name<b></th>

                        <th scope="col"><b>Price<b></th>
                        <th scope="col"><b>Quantity<b></th>

                        <th scope="col"><b>Payment Status<b></th>
                        <th scope="col"><b>Delivery Status<b></th>
                        <th scope="col"><b>Image<b></th>
                        <th scope="col"><b>Action<b></th>



                    </tr>
                </thead>
                <tbody>




                    @foreach ($order as $order)
                        <tr>

                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td><img src="{{ asset('/product') . '/' . $order->image }}" alt=""
                                    style="width: 65px"></td>

                            <td>
                                @if ($order->delivery_status=='processing')
                                <a href="{{ url('/cancel_order', $order->id) }}"
                                    onclick="return confirm('Cancel this order?')" class="btn btn-danger">Cancel</a>
                                @else
                                <p>Not Allowed</p>
                                @endif

                            </td>


                        </tr>
                    @endforeach
                </tbody>


            </table>


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
