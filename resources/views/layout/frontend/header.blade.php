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
          @guest
        <a href="{{ route('register') }}" class="btn btn-link">Register</a>
        <a href="{{ route('login') }}" class="btn btn-link">Login</a>
      @endguest
          @auth
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn  btn-link" title="Logout">Logout</button>
        </form>
      @endauth
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
          <a href=" #">
            <img style="height: 150px; width: 150px;" src="{{ asset('logo/logo.jpg') }}" alt="Logo" />
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-4">
        <div class="b-ads">
          <a href="#">
            <img  style="height: 40px; width: 60px;" src="{{ asset('logo/sub_logo.jpg') }}" alt="Ads" />
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="b-search">
          <form action="{{route('frontend.search')}}" method="POST">
            @csrf
            <input type="text" name="search" placeholder="Search" />
            <button title="Search" type="submit"><i class="fa fa-search"></i></button>
          </form>
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
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto">
          <a href="{{route('frontend.post')}}" class="nav-item nav-link active">Home</a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
            <div class="dropdown-menu">
              @foreach ($categories as $category)
          <a href="{{ route('frontend.category', $category->slug) }}" class="dropdown-item"
          title="{{$category->name}}"> {{$category->name}}</a>
        @endforeach
            </div>
          </div>
          
        
          <a href="{{route('frontend.dashboard')}}" class="nav-item nav-link">Account</a>
        
          <a href="{{route('frontend.notifications-profile')}} " title="Notifications" class="nav-item nav-link"> Notifications </a>
          <a href="{{route('frontend.contact-us')}} " title="Contact Us" class="nav-item nav-link">Contact Us</a>
        </div>
        <div class="social ml-auto">
          <a href="{{App\Models\Setting::first()->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="{{App\Models\Setting::first()->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="{{App\Models\Setting::first()->linkendin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
          <a href="{{App\Models\Setting::first()->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="{{App\Models\Setting::first()->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>

          <!-- Notification Dropdown -->
          @auth
          <a href="#" class="nav-link dropdown-toggle" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell"></i>
              <span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown" style="width: 400px;">
              <div class="dropdown-header"> <a href="{{ route('frontend.notifications-profile') }}">Notifications</a> </div>
              
              <!-- Notifications read all -->
              <div class="dropdown-item">
                  <a href="{{ route('frontend.read-all') }}" class="btn btn-sm btn-primary" style="width: 100%;  ">Read All</a>
              </div>
                @forelse (auth()->user()->unreadNotifications()->latest()->take(2)->get() as $notification)
                    <div class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>
                            <a href="{{ $notification->data['link'] }}?notify={{ $notification->id }}" class="text-dark">{{ $notification->data['title'] }}</a>
                        </span>
                        <form action="{{ route('frontend.delete-notification', $notification->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $notification->id }}">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                @empty
                    <div class="dropdown-item text-center">No notifications</div>
                @endforelse
            </div>
            @endauth
                  
        </div>
      </div>
    </nav>
  </div>
</div>
<!-- Nav Bar End -->