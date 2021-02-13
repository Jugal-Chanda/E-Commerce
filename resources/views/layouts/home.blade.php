<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zontrotech</title>
    <link rel="icon" href="{{ asset('custom/img/logo_small.png') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9ec2b217e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">
    @yield('css')
  </head>
  <body>
    <div class="bg-light py-2 pl-2">
      <div class="container">
        @guest
        Welcome visitor
          <a href="{{ route('login') }}"> {{ __('Login') }}</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}"> / {{ __('Register') }}</a>
        @endif
        @else
          Welcome {{ Auth::user()->name }}
        @endguest
      </div>
    </div>
    <header class="container mb-2">
      <!-- Header 1 -->
      <div class="row">
        <div class="col-lg-4 justify-content-center logo_div_container">
          <div class="logo_container">
            <img src="{{asset('custom/img/logo.png')}}" alt="">
          </div>

        </div>
        <div class="col-lg-8 d-flex align-items-center">
        <!-- <div class="bg-danger" style="width: 200px; height: 20px;">
        </div> -->
          <nav class="navbar navbar-expand-lg main_nav">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fas fa-sliders-h"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active top_nav_item">
                  <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item top_nav_item">
                  <a class="nav-link" href="{{ route('profile') }}">Profile </a>
                </li>

                <li class="nav-item top_nav_item">
                  <a class="nav-link" href="{{ route('toutorials') }}">Tutorials</a>
                </li>
                <li class="nav-item top_nav_item">
                  <a class="nav-link" href="{{ route('offers') }}">Offer</a>
                </li>
                <li class="nav-item top_nav_item">
                  <a class="nav-link" href="{{ route('mycart') }}">My Carts</a>
                </li>
                <li class="cart_icon_container">
                  <div class="cart_icon">
                    <a href="{{ route('mycart') }}"><i class="fas fa-shopping-cart fa-lg"></i></a>
                    <div class="cart_count">
                      @if(isset($cart_count))
                      {{ $cart_count }}
                      @else
                      0
                      @endif
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>

        </div>

      </div>

      

    </header>

    <div class="bg-light my-3">
        @yield('content')
    </div>



    <footer class="mt-5">
            <div class="container mt-2 footer">
                <div class="row no-gutters">
                    <div class="col-md-4 col-lg-3">
                        <div class="footer_logo">
                            <a class="" href="#"><img src="{{ asset('custom/img/logo.png') }}" alt=""></a>
                        </div>
                        <div class="details mt-2">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p class="">Rampura, Aftabnagar, Dhaka</p>
                        </div>
                        <div class="details mt-2">
                            <span><i class="fas fa-phone-alt"></i></span>
                            <p class="">+880-15213-15386</p>
                        </div>
                        <div class="details mt-2">
                            <span><i class="fas fa-mail-bulk"></i></span>
                            <p class="">contact@zontrotech.com</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-5 text-center" style="">
                        <h4>Important Links</h4>
                        <ul class="footer_important_links">
                            <li> <a href="#">Products</a> </li>
                            <li><a href="#">My account</a></li>
                            <li> <a href="#">Tutorials</a> </li>
                        </ul>
                    </div>

                    <div class="col-md-4 col-lg-4">
                        <h4>Contact Us</h4>
                        <form class="" action="{{ route('contact') }}" method="post">
                          @csrf
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" value="" class="form-control contact_us_input @error('name') is-invalid @enderror" id="name" required>
                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" name="email" value="" class="form-control contact_us_input @error('email') is-invalid @enderror" id="email" required >
                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Messgae</label>
                                <textarea name="message" rows="4" cols="80" id="message" class="form-control contact_us_textarea @error('message') is-invalid @enderror" required></textarea>
                                @error('message')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="text-center">
                              <button type="submit" name="button" class="btn btn-sm btn-success">Send</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </footer>


      @yield('js')

  </body>
</html>
