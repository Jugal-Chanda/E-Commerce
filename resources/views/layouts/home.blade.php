<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('custom/css/home/style.css') }}">
        @yield('customcss')
    </head>
    <body>
        <header class="container">
            <div class="">
                <div class="bg-dark text-white py-1">
                    <div class="row no-gutters">
                        <div class="col-md-6 text-sm-center text-md-left">
                            Call +880-12345-12345
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <a href="" class="top_nav_link">My Profile</a>
                                <a href="" class="top_nav_link">Login</a>
                                <a href="" class="top_nav_link">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg main_nav">
                <a class="navbar-brand" href="#"><img src="{{ asset('custom/img/home/amex.png') }}" alt=""></a>
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
                      <a class="nav-link" href="#">Profile </a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="#">Category</a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="#">Tutorials</a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="#">Offer</a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="#">Training Courses</a>
                    </li>
                    <li class="nav-item top_nav_item">
                      <a class="nav-link" href="">My Carts</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Carts
                      </a>
                      <div class="dropdown-menu dropdown-menu-right cart_dropdown" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                          <img src="app/img/book1.png" alt="" class="cart_dropdown_product_img">
                          <span class="ml-2">Book1</span>
                        </a>
                        <a class="dropdown-item" href="#">
                          <img src="app/img/book1.png" alt="" class="cart_dropdown_product_img">
                          <span class="ml-2">Book1</span>
                        </a><a class="dropdown-item" href="#">
                          <img src="app/img/book1.png" alt="" class="cart_dropdown_product_img">
                          <span class="ml-2">Book1</span>
                        </a><a class="dropdown-item" href="#">
                          <img src="app/img/book1.png" alt="" class="cart_dropdown_product_img">
                          <span class="ml-2">Book1</span>
                        </a><a class="dropdown-item" href="#">
                          <img src="app/img/book1.png" alt="" class="cart_dropdown_product_img">
                          <span class="ml-2">Book1</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li> -->

                  </ul>
                </div>
            </nav>
        </header>

        <section class="container mt-1">
            @yield('content')

        </section>

        <footer>
            <div class="container mt-2 footer">
                <div class="row no-gutters">
                    <div class="col-md-4 col-lg-3">
                        <div class="footer_logo">
                            <a class="" href="#"><img src="{{ asset('custom/img/home/amex.png') }}" alt=""></a>
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
        <script type="text/javascript" src="{{ asset('custom/js/home/javascript.js') }}"></script>
        @yield('customjs')

    </body>
</html>
