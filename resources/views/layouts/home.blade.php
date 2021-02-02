<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zontrotech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9ec2b217e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">
    @yield('css')
  </head>
  <body>
    <header class="container">
      <!-- Header 1 -->
      <div class="header1">
        <div class="call">
          Call: +8801521461643
        </div>
        <div class="login_registration">
          @guest
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
          @endif
          @else
            <a  href="#" >{{ Auth::user()->name }} <span class="caret"></span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <input type="submit" name="" value="{{ __('Logout') }}">
            </form>
          @endguest
        </div>
      </div>
      <!-- Header 1 End -->

      <!-- Header 2 -->
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
                      <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item top_nav_item" >
                      <a class="nav-link" href="#" style="color: #ff3900; font-size: 18px; background-color: rgba(0, 105, 204,0.6); border-radius: 9px;">Tutorials</a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="{{ route('offers') }}">Offer</a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="#">Training Courses</a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="{{ route('mycart') }}">My Carts</a>
                    </li>
                  </ul>
                </div>
            </nav>

        </div>

      </div>
      <!-- Header 2 end-->
      </div>

    </header>

    @yield('content')

    <footer>
            <div class="container mt-2 footer">
                <div class="row no-gutters">
                    <div class="col-md-4 col-lg-3">
                        <div class="footer_logo">
                            <a class="" href="#"><img src="{{ asset('custom/img/logo.png') }}" alt=""></a>
                        </div>
                        <div class="details mt-2">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p class="">East West University</p>
                        </div>
                        <div class="details mt-2">
                            <span><i class="fas fa-phone-alt"></i></span>
                            <p class="">+880-12345-12345</p>
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
                        <form class="" action="index.html" method="post">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" name="" value="" class="form-control contact_us_input" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" name="" value="" class="form-control contact_us_input" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Messgae</label>
                                <textarea name="name" rows="4" cols="80" id="message" class="form-control contact_us_textarea"></textarea>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </footer>


      @yield('js')

  </body>
</html>
