{{-- blog-single goes here (single post page) --}}<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Bloggy</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

      <link rel="stylesheet" href=" {{ asset('css/open-iconic-bootstrap.min.css') }} ">
      <link rel="stylesheet" href=" {{ asset('css/animate.css') }} ">

      <link rel="stylesheet" href=" {{ asset('css/owl.carousel.min.css') }} ">
      <link rel="stylesheet" href=" {{ asset('css/owl.theme.default.min.css') }} ">
      <link rel="stylesheet" href=" {{ asset('css/magnific-popup.css') }} ">

      <link rel="stylesheet" href=" {{ asset('css/aos.css') }} ">

      <link rel="stylesheet" href=" {{ asset('css/ionicons.min.css') }} ">

      <link rel="stylesheet" href=" {{ asset('css/flaticon.css') }} ">
      <link rel="stylesheet" href=" {{ asset('css/icomoon.css') }} ">
      <link rel="stylesheet" href=" {{ asset('css/style.css') }} "> -->
  
    
  
    </head>
    <body>
  
        <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
          <div class="container">
            <a class="navbar-brand" href="index.html">Blog<i>gy</i>.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="oi oi-menu"></span> Menu
            </button>
  
            <div class="collapse navbar-collapse" id="ftco-nav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="blog.html" class="nav-link">Posts</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">Tags</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">Trash</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Users</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Dashboard</a></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- END nav -->
  
      <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url( {{ asset('storage/' . $post->image) }} );" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
              <h1 class="mb-3 bread">{{ $post->title }} </h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> {{ $post->title }} <span> <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
  
     <section class="ftco-section ftco-degree-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 ftco-animate">
                <p class="mb-5">
                    {{!! $post->content !!}} 
                </p>
              <div class="tag-widget post-tag-container mb-5 mt-5">
                <div class="tagcloud">
                  @foreach ( $post->tags as $tag )
                    <a href="#" class="tag-cloud-link">{{ $tag->name }}</a>
                  @endforeach
                </div>
              </div>
  
              <div class="about-author d-flex p-4 bg-light">
                <div class="bio mr-5">
                  {{-- <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4"> --}}
                <img src=" {{ $user->hasImage() ? $user->getImage() : $user->getGravatar() }} " alt="Image placeholder" class="img-fluid mb-4">
                </div>
                <div class="desc">
                  <h3> {{ $user->name }}</h3>
                  <p>{{ $user->profile->about }}</p>
                </div>
              </div>
  
  
        
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
              <div class="sidebar-box">
                <form action="#" class="search-form">
                  <div class="form-group">
                    <span class="icon icon-search"></span>
                    <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <div class="sidebar-box ftco-animate">
                <div class="categories">
                  <h3>Categories</h3>
                  @foreach ($categories as $category)
                    <li><a href="#"> {{ $category->name }} <span class="ion-ios-arrow-forward"></span></a></li>  
                  @endforeach
                </div>
              </div>
  
         
  
              <div class="sidebar-box ftco-animate">
                <h3>Paragraph</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div>
  
          </div>
        </div>
      </section> <!-- .section -->
  
      <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> </p>
            </div>
          </div>
        </div>
      </footer>
  
  
  
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  
    <script src=" {{ asset('js/jquery.min.js') }} "></script>
    <script src=" {{ asset('js/jquery-migrate-3.0.1.min.js') }} "></script>
    <script src=" {{ asset('jquery-migrate-3.0.1.min.js') }} "></script>
    <script src=" {{ asset('js/popper.min.js') }} "></script>
    <script src=" {{ asset('js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('js/jquery.easing.1.3.js') }} "></script>
    <script src=" {{ asset('js/jquery.waypoints.min.js') }} "></script>
    <script src=" {{ asset('js/jquery.stellar.min.js') }} "></script>
    <script src=" {{ asset('js/owl.carousel.min.js') }} "></script>
    <script src=" {{ asset('js/jquery.magnific-popup.min.js') }} "></script>
    <script src=" {{ asset('js/aos.js') }} "></script>
    <script src=" {{ asset('js/jquery.animateNumber.min.js') }} "></script>
    <script src=" {{ asset('js/scrollax.min.js') }} "></script>
    <script src=" {{ asset('js/aos.js') }} "></script>
    <script src=" {{ asset('js/google-map.js') }} "></script>
    <script src=" {{ asset('js/main.js') }} "></script>

    </body>
  </html>