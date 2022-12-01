<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-bottom: 40px;
            overflow-x: auto


        }
        .Productlist{
            font-size: 40px;
            padding-bottom:40px
        }
        .table{
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
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
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
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
                        x
                      </button>
                    {{session()->get('message')}}
                </div>

            @endif
                <div class="div_center">
                   <h2 class="Productlist">Product List</h2>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"><b>Product Name<b></th>
                        <th scope="col"><b>Description<b></th>
                        <th scope="col"><b>Quantity<b></th>
                        <th scope="col"><b>Category<b></th>
                        <th scope="col"><b>Price<b></th>
                        <th scope="col"><b>Discount Price<b></th>
                        <th scope="col"><b>Product Image<b></th>
                        <th scope="col"><b>Delete<b></th>
                        <th scope="col"><b>Edit<b></th>



                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}} </td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discounted_price}}</td>
                            <td><img src="{{asset('product').'/'.$product->image}}"  />   </td>
                            <td><a onclick="return confirm('Are you sure You want to delete')" class="btn btn-danger" href="{{url('/delete_product',$product->id)}}">Delete</a></td>
                            <td><a class="btn btn-success" href="{{url('/update_product', $product->id)}}">Edit</a></td>

                          </tr>

                        @endforeach
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

