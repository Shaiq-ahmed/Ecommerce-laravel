<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')
    <style type="text/css" >
        .addProduct_center{
            text-align: center;
            padding-bottom: 40px
        }
        .h1_addProduct{
            font-size: 40px;
            padding-bottom:40px
        }
        .text-color{
            color: black
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_adjust{
            padding-bottom: 15px;
        }

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
                <div class="addProduct_center">
                    <h1 class="h1_addProduct">Add Product</h1>
                    <form action="{{url('/addProduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_adjust">
                        <label>Product Name :</label>
                        <input type="text" class="text-color" name="title" placeholder="enter Product Name" required>
                    </div>
                    <div class="div_adjust">
                        <label>Description :</label>
                        <input type="text" class="text-color" name="description" placeholder="enter Product Description" required>
                    </div>
                    <div class="div_adjust">
                        <label>Price :</label>
                        <input type="number" class="text-color" name="price" placeholder="enter Product Price" required>
                    </div>
                    <div class="div_adjust">
                        <label>Category :</label>
                        <select class="text-color" name="category" required>
                            <option value="" selected>Choose a Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->category_name}}" >{{$category->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="div_adjust">
                        <label>Quantity :</label>
                        <input type="number" class="text-color" name="quantity" min="0" placeholder="enter Product quantity" required>
                    </div>
                    <div class="div_adjust">
                        <label>Discount Price:</label>
                        <input type="number" class="text-color" name="discounted_price" placeholder="enter Product Discount price">
                    </div>
                    <div class="div_adjust">
                        <label>Product Image :</label>
                        <input type="file" name="image" required>
                    </div>
                    <div>

                        <input type="submit" value="Add Product" class="btn btn-primary" >
                    </div>
                </form>

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
