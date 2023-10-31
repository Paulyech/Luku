<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">

         @foreach ($products as $product)
            
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('details_product', $product->id)}}" class="option1">
                        View Details
                     </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{ asset('storage/' . $product->image) }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$product->title}}
                   </h5>

                   @if ($product->discount_price !=null)
                     <h6 style="color: red;">
                       $ {{$product->discount_price}}
                     </h6>

                     <h6 style="text-decoration: line-through;color:blue;">
                        ${{$product->price}}
                     </h6>

                    
                         
                     @else
                     <h6>
                       ${{$product->price}}
                     </h6>
                    
                   @endif
                   
                   
                </div>
             </div>
          </div>
          @endforeach


          </div>
          <span>
            {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}

          </span>
       </div>
       
   
 </section>