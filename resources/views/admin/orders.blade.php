<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-bottom: 40px;
            overflow-x: auto
        }

        .Productlist {
            font-size: 40px;
            padding-bottom: 40px
        }

        .table {
            text-align: center;
            padding-bottom: 40px;
            margin: auto;
            width: 100%;
            color: whitesmoke;
            border-collapse: collapse;
        }

        /* tr:hover {background-color: crimson;} */
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                                more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.nav')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                aria-hidden="true">
                                x
                            </button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="div_center">
                        <h2 class="Productlist">Orders List</h2>
                        <div>
                        <form action="{{url('/search_order')}}" method="GET">
                            @csrf
                            <input type="text" name="search" style="color: black" placeholder="Search for Something">
                            {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
                            <input type="submit" value="Search" class="btn btn-primary">
                        </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><b>User Name<b></th>
                                    <th scope="col"><b>Email<b></th>
                                    <th scope="col"><b>Phone No<b></th>
                                    <th scope="col"><b>Address<b></th>
                                    <th scope="col"><b>user_id<b></th>
                                    <th scope="col"><b>product title<b></th>
                                    <th scope="col"><b>Price<b></th>
                                    <th scope="col"><b>Quantity<b></th>

                                    <th scope="col"><b>Product_id<b></th>
                                    <th scope="col"><b>Payment Status<b></th>
                                    <th scope="col"><b>Delivery Status<b></th>
                                    <th scope="col"><b>Image<b></th>
                                    <th scope="col"><b>Delivered<b></th>
                                        <th scope="col"><b>PDF<b></th>
                                        <th scope="col"><b>Send Email<b></th>




                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $orders)
                                    <tr>
                                        <td>{{ $orders->name }}</td>
                                        <td>{{ $orders->email }} </td>
                                        <td>{{ $orders->phone }}</td>
                                        <td>{{ $orders->address }}</td>
                                        <td>{{ $orders->user_id }}</td>
                                        <td>{{ $orders->product_title }}</td>
                                        <td>{{ $orders->price }}</td>
                                        <td>{{ $orders->quantity }}</td>
                                        <td>{{ $orders->product_id }}</td>
                                        <td>{{ $orders->payment_status }}</td>
                                        <td>{{ $orders->delivery_status }}</td>
                                        <td><img src="{{ asset('product') . '/' . $orders->image }}" /> </td>
                                        <td>
                                            @if ($orders->delivery_status == 'processing')

                                                <a href="{{ url('/deliver', $orders->id) }}" class="btn btn-primary"
                                                    onclick="return confirm('Change status to deliver ?')"> Delivered </a>


                                            @else
                                                <p style="color: rgb(7, 216, 7)">Delivered</p>

                                            @endif
                                        </td>
                                        <td>


                                                <a href="{{ url('/pdf', $orders->id) }}" class="btn btn-secondary"
                                                > Download PDF </a>
                                        </td>
                                        <td>


                                            <a href="{{ url('/send_email', $orders->id) }}" class="btn btn-success"
                                            > Send Email </a>
                                    </td>


                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center">
                                            No Data Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
