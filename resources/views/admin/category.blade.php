!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">

        .center{
            text-align: center;
            padding-bottom: 40px
        }
        .h2_category{
            font-size: 40px;
            padding-bottom:40px

        }
        .input{
            color: black;
            height: 35px;
            padding-left: 5px;
            border-radius: 5px
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
                <div class="center">
                    <h2 class="h2_category">Add Category</h2>
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input class='input' placeholder="enter category" name="category_name">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
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

