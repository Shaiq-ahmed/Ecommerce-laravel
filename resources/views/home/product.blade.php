<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
        @foreach ($products as $product )


          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('/product_details', $product->id)}}" class="option1">
                      Product Details
                      </a>

                   </div>
                </div>
                <div class="img-box">
                   <img src="{{asset('/product').'/'.$product->image}}" alt="">
                </div>
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



                </div>
             </div>
          </div>
          @endforeach
          <span style="padding-top: 45px; margin:auto">
            {!!$products->links('pagination::bootstrap-4')!!}
         </span>


    </div>
 </section>


