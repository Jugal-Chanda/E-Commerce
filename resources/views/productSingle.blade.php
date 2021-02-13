@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="{{ asset('custom/css/product.css') }}">

<style media="screen">
.card {
  border: none;
}
</style>
@endsection

@section('content')


<section class="container">
  <div class="my-2">
    @if(count($announcements))
      <marquee behavior="scroll" direction="left" style="color: red; font-weight: 400;">
        @foreach($announcements as $announcement)
        ***{{ $announcement->announcement }}***
        @endforeach
      </marquee>
    @endif
  </div>
      <div class="row">
        <div class="col-md-4 product_image">

          <div class="img-zoom-container ">
            <div class="product_single_main_image">
              <img id="myimage" src="{{ asset($product->image1) }}" class="main_img" alt="Girl">
            </div>
            <div id="myresult" class="img-zoom-result"></div>
          </div>

          <div class="product_single_other_image">
            <img src="{{ asset($product->image1) }}" alt="" id="other_img_1" class="other_img">
            <img src="{{ asset($product->image2) }}" alt="" id="other_img_2" class="other_img">
            <img src="{{ asset($product->image3) }}" alt="" id="other_img_3" class="other_img">
            <img src="{{ asset($product->image4) }}" alt="" id="other_img_4" class="other_img">
          </div>

        </div>
        <div class="col-md-4 product_description">
          <h2 class="text-capitalize">{{ $product->name }}</h2>
          <h4 class="text-capitalize">{{ $product->category->name }}</h4>
          <table class="text-capitalize">
            <tr>
              <td>model</td>
              <td>: {{ $product->model }}</td>
            </tr>
            <tr>
              <td>Product in stock</td>

                @if($product->hasStock())
                   <td>: {{ $product->stock()->quantity - $product->stock()->sold}}</td>
                @else
                   <td class="text-danger">: Out Of Stock</td>
                @endif
            </tr>
            <tr>
              <td>Category</td>
              <td>: <a href="" class="btn btn-link p-0 m-0">{{ $product->category->name }}</a> </td>
            </tr>
          </table>
          @if($product->hasStock())
            @if($product->stock()->hasOffer())
            <div class="product_price product_offer">
              <span>{{ $product->priceShow("original") }}</span>
              {{ $product->priceShow("offer") }}
            </div>
            @else
            <div class="product_price">
              {{ $product->priceShow("original") }}
            </div>
            @endif
          @else
          <div class="product_out_of_stock">
            {{ $product->priceShow("original") }}
          </div>
          @endif
          <a href="{{ route('addtocart',['id'=>$product->id]) }}" class="btn add_to_cart_btn">Add to cart</a>

        </div>
        <div class="col-md-4 product_tutorial">
          <h4>Tutorials</h4>
            @foreach($product->toutorials as $key=>$toutorial)
              @if($key < 2 )
                @if($toutorial->hasParts())
                <iframe  type="text/html" height="200" src="https://www.youtube.com/embed/{{ $toutorial->parts[0]->code }}" frameborder="0" allowfullscreen style="width: 100%;"></iframe>
                @else
                <a href="#" target="_blank"> <span class="pl-2">{{ $key }}.</span> {{ $toutorial->name }}(Comming Soon)</a><br>
                @endif
              @else
              <a href="#" target="_blank">{{ $toutorial->name }}</a><br>
              @endif
            @endforeach
        </div>

      </div>

      <div class="row ">
        @foreach($product->related()->inRandomOrder()->take(4)->get() as $related)
        <div class="col-md-3 mb-2 related_product_container">
          <div class=" py-2">
            <div class="related_product_image">
              <a href="{{ route('productSingle',['product'=>$related->id]) }}"><img src="{{ asset($related->image1) }}" alt="Product1"></a>
            </div>
            <div class="related_product_sort_description">
              {{ $related->name }}
            </div>
            @if($related->hasStock())
              @if($related->stock()->hasOffer())
              <div class="related_product_price related_product_offer">
                <span>{{ $related->priceShow("original") }}</span>
                {{ $related->priceShow("offer") }}
              </div>
              @else
              <div class="related_product_price">
                {{ $related->priceShow("original") }}
              </div>
              @endif
            @else
            <div class="related_product_out_of_stock">
              {{ $related->priceShow("original") }}
            </div>
            @endif
          </div>
        </div>
        @endforeach

      </div>

      <div class="mt-5">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active"  data-toggle="tab" href="#description" role="tab" aria-controls="home" aria-selected="true">Description</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link"  data-toggle="tab" href="#discussion" role="tab" aria-controls="profile" aria-selected="false">Discussion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#review" role="tab" aria-controls="contact" aria-selected="false">Review</a>
          </li> -->
        </ul>
        <div class="tab-content mt-5 text-justify">
          <div class="tab-pane fade show active " id="description" role="tabpanel" >

            {!! $product->description !!}
          </div>


          <div class="tab-pane fade" id="discussion" role="tabpanel" >
            <div class="discussion_pannel">
              <div class="card discussion_single">
                <!-- For main discussion-->
                <div class="card-header d-flex">
                  <div class="user_img">
                    <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                  </div>
                  <div class="user_name">
                    <h5>Jugal Kishore Chanda</h5>
                  </div>
                </div>

                <div class="card-body bg-light">

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                  <div class="reply_btn">
                    <button class="btn btn-link see_replies" data-reply-id="disid01"><span>0 Reply</span> </button>
                    <button class="btn btn-link reply_a_discussion" data-reply-form-id="rf-disid01">Reply</button>
                  </div>
                  <div id="disid01" class="collapse ml-2">
                    <div class="card discussion_reply" id="rf-disid01">
                      <div class="card-body bg-light ">
                        <form class="" action="" method="post">
                          <input type="text" name="discussion_id" value="01" hidden>
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="" value="" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Your problem description</label>
                            <textarea name="name" rows="8" cols="80" class="form-control"></textarea>

                          </div>
                        </form>
                      </div>

                    </div>

                    <div class="card">
                      <div class="card-header d-flex">
                        <div class="user_img">
                          <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                        </div>
                        <div class="user_name">
                          <h5>Jugal Kishore Chanda</h5>
                        </div>
                      </div>
                      <div class="card-body bg-light">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header d-flex">
                        <div class="user_img">
                          <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                        </div>
                        <div class="user_name">
                          <h5>Jugal Kishore Chanda</h5>
                        </div>
                      </div>
                      <div class="card-body bg-light">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                      </div>
                    </div>


                  </div>
                </div>
              </div>

              <div class="card discussion_single">
                <!-- For main discussion-->
                <div class="card-header d-flex">
                  <div class="user_img">
                    <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                  </div>
                  <div class="user_name">
                    <h5>Jugal Kishore Chanda</h5>
                  </div>
                </div>

                <div class="card-body bg-light">

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                  <div class="reply_btn">
                    <button class="btn btn-link see_replies" data-reply-id="disid02" href=""><span>0 Reply</span> </button>
                    <button class="btn btn-link reply_a_discussion" data-reply-form-id="rf-disid02" href="">Reply</button>
                  </div>
                  <div id="disid02" class="collapse ml-2">
                    <div class="card discussion_reply" id="rf-disid02">
                      <div class="card-body bg-light ">
                        <form class="" action="" method="post">
                          <input type="text" name="discussion_id" value="01" hidden>
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="" value="" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Your problem description</label>
                            <textarea name="name" rows="8" cols="80" class="form-control"></textarea>

                          </div>
                        </form>
                      </div>

                    </div>

                    <div class="card">
                      <div class="card-header d-flex">
                        <div class="user_img">
                          <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                        </div>
                        <div class="user_name">
                          <h5>Jugal Kishore Chanda</h5>
                        </div>
                      </div>
                      <div class="card-body bg-light">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header d-flex">
                        <div class="user_img">
                          <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                        </div>
                        <div class="user_name">
                          <h5>Jugal Kishore Chanda</h5>
                        </div>
                      </div>
                      <div class="card-body bg-light">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                      </div>
                    </div>


                  </div>
                </div>
              </div>



            </div>
            <div class="mt-2">

              <h4 class="text-center">Post your discussion</h4>
              <form class="" action="" method="post">
                <div class="form-group">
                  <label for="">Your Name</label>
                  <input type="text" name="" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Your discussion</label>
                  <textarea name="name" rows="8" cols="80" class="form-control"></textarea>

                </div>
                <div class="form-group text-center">
                  <button type="submit" name="button" class="btn btn-primary btn-sm px-4">Post</button>

                </div>

              </form>

            </div>
          </div>

          <div class="tab-pane fade" id="review" role="tabpanel">
            <div class="card">
              <div class="card-header d-flex">
                <div class="user_img">
                  <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                </div>
                <div class="user_name d-flex align-items-center ml-2">
                  <h5>Jugal Kishore Chanda</h5>
                </div>
              </div>
              <div class="card-body bg-light">
                <h2>4.4</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header d-flex">
                <div class="user_img">
                  <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                </div>
                <div class="user_name d-flex align-items-center ml-2">
                  <h5>Jugal Kishore Chanda</h5>
                </div>
              </div>
              <div class="card-body bg-light">
                <h2>4.4</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header d-flex">
                <div class="user_img">
                  <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                </div>
                <div class="user_name d-flex align-items-center ml-2">
                  <h5>Jugal Kishore Chanda</h5>
                </div>
              </div>
              <div class="card-body bg-light">
                <h2>4.4</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header d-flex">
                <div class="user_img">
                  <img src="{{ asset('custom/img/avatar6.png') }}" alt="">
                </div>
                <div class="user_name d-flex align-items-center ml-2">
                  <h5>Jugal Kishore Chanda</h5>
                </div>
              </div>
              <div class="card-body bg-light">
                <h2>4.4</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>

      </div>


    </section>

>

@endsection


@section('js')

<script type="text/javascript">

function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /* Create lens: */
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /* Insert lens: */
  img.parentElement.insertBefore(lens, img);
  /* Calculate the ratio between result DIV and lens: */
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /* Set background properties for the result DIV */
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /* Execute a function when someone moves the cursor over the image, or the lens: */
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /* And also for touch screens: */
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    /* Calculate the position of the lens: */
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /* Prevent the lens from being positioned outside the image: */
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /* Set the position of the lens: */
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /* Display what the lens "sees": */
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}

$('.other_img').click(function(){
  img_src = $(this).attr('src');
  $('.main_img').attr('src',img_src);
});

$( ".img-zoom-lens" ).remove();
$('#myresult').css('display','none');

$('.product_single_main_image').mouseenter(function(){
  $('#myresult').css('display','block');
  imageZoom("myimage", "myresult");
});

$('.product_single_main_image').mouseleave(function(){
  $( ".img-zoom-lens" ).remove();
  $('#myresult').css('display','none');
});

$('.see_replies').click(function() {
  disid = $(this).attr('data-reply-id');
  disformid = '#rf-'+disid;
  disid = '#'+disid;
  $(disid).collapse('toggle');
  $(disformid).css('display','none');

});

$('.reply_a_discussion').click(function() {
  disformid = $(this).attr('data-reply-form-id');
  disid  = '#'+disformid.split("-")[1];
  disformid = '#'+disformid;
  $(disformid).css('display','block');
  $(disid).collapse('show');
});


</script>





@endsection
