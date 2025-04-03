   <!-- Top Bar Start -->
   <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="tb-contact">
          <p><i class="fas fa-envelope"></i>{{$getSetting->email}}</p>
          <p><i class="fas fa-phone-alt"></i> {{$getSetting->phone}}</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tb-menu">
            <a href="">About</a>
            <a href="">Privacy</a>
            <a href="">Terms</a>
            <a href="">Contact</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top Bar Start -->
  <!-- Brand Start -->
  <div class="brand">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-4">
          <div class="b-logo">
            <a href="index.html">
              <img src="img/logo.png" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="b-ads">
            <a href="https://htmlcodex.com">
              <img src="img/ads-1.jpg" alt="Ads" />
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-4">
          <div class="b-search">
            <input type="text" placeholder="Search" />
            <button><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Brand End -->

  <!-- Nav Bar Start -->
  <div class="nav-bar">
    <div class="container">
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">MENU</a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav mr-auto">
            <a href="{{route('frontend.post')}}" class="nav-item nav-link active">Home</a>  
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Categories</a
              >
              <div class="dropdown-menu">
                @foreach ($categories as $category)
                  <a href="{{ route('frontend.category', $category->slug) }}" class="dropdown-item" title="{{$category->name}}" >  {{$category->name}}</a>
                @endforeach
               </div>
            </div>
            <a href="{{route('frontend.show-posts', $last_posts->first()->slug)}}" class="nav-item nav-link" >Single Page</a>
            <a href="dashboard.html" class="nav-item nav-link">Dashboard</a>
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
          </div>
          <div class="social ml-auto">
            <a href="{{App\Models\Setting::first()->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a> 
            <a href="{{App\Models\Setting::first()->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="{{App\Models\Setting::first()->linkendin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="{{App\Models\Setting::first()->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="{{App\Models\Setting::first()->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Nav Bar End -->
