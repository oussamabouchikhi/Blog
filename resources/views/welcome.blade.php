<!DOCTYPE html>
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
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">

  </head>
  <body>

	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ route('welcome') }}">Blog<i>gy</i>.</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ route('welcome') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">Posts</a></li>
            <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Categories</a></li>
            <li class="nav-item"><a href="{{ route('tags.index') }}" class="nav-link">Tags</a></li>
            <li class="nav-item"><a href="{{ route('trash.index') }}" class="nav-link">Trash</a></li>
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">setting</a></li>
          </ul>
        </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate">
          	<h2 class="subheading">Hello! Welcome to</h2>
          	<h1 class="mb-4 mb-md-0">Bloggy</h1>
          	<div class="row">
          		<div class="col-md-7">
          			<div class="text">
	          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								</div>
          		</div>
          	</div>
          </div>
        </div>
      </div>
    </div>

   	<section class="ftco-section">
   		<div class="container">
        <!-- Posts -->
   			<div class="row">
   				<div class="col-md-12">

                 @foreach ($posts as $post) 
   					    <div class="case">
       						<div class="row">
       							<div class="col-md-6 col-lg-6 col-xl-8 d-flex">
       								<a
                            href="blog-single.html" class="img w-100 mb-3 mb-md-0"
                            {{-- style="background-image: url(images/image_1.jpg);" --}}
                            style="background-image: url( {{ asset('storage/' . $post->image) }} );"
                         >
                       </a>
       							</div>
       							<div class="col-md-6 col-lg-6 col-xl-4 d-flex">
       								<div class="text w-100 pl-md-3">
       									<span class="subheading">{{ $post->category->name }} </span>
       									<h2>
                          
                          <a href=" {{ route('posts.show', $post->id) }} ">
                            {{ $post->title }}
                          </a>
                        </h2>
       									<ul class="media-social list-unstyled">
    			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
    			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
    			              </ul>
       									<div class="meta">
       										<p class="mb-0">{{ $post->created_at }} </p>
       									</div>
       								</div>
       							</div>
       						</div>
       					</div>
            @endforeach

   				</div>
   			</div>
        <!-- Posts -->


   		</div>
   	</section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">

        <div class="col-md-12 text-center">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Oussama Bouchikhi</div>
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
