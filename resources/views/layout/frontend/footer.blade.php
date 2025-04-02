  <!-- Footer Start -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="footer-widget">
            <h3 class="title">Get in Touch</h3>
            <div class="contact-info">
              <p><i class="fa fa-map-marker" title="{{App\Models\Setting::first()->city}}"></i>{{App\Models\Setting::first()->city}}</p>

              <p><i class="fa fa-envelope" title="{{App\Models\Setting::first()->email}}"></i> {{App\Models\Setting::first()->email}}</p>
              <p><i class="fa fa-phone" title="{{$getSetting->phone}}"></i> {{$getSetting->phone}}</p>
              <div class="social" title="{{$getSetting->twitter}}">
                <a href="{{$getSetting->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="{{$getSetting->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{{$getSetting->linkendin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a href="{{$getSetting->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="{{$getSetting->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>  

        <div class="col-lg-3 col-md-6">
          <div class="footer-widget">
            <h3 class="title">Useful Links</h3>
            <ul>
               @foreach ($getRelatedNewsSite as $item)
                <li><a href="{{$item->url}}" title="{{$item->name}}" target="_blank">{{$item->name}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-widget">
            <h3 class="title">Quick Links</h3>
            <ul>
              <li><a href="#">Lorem ipsum</a></li>
              <li><a href="#">Pellentesque</a></li>
              <li><a href="#">Aenean vulputate</a></li>
              <li><a href="#">Vestibulum sit amet</a></li>
              <li><a href="#">Nam dignissim</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-widget">
            <h3 class="title">Newsletter</h3>
            <div class="newsletter">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Vivamus sed porta dui. Class aptent taciti sociosqu
              </p>
              <form action="{{route('frontend.new-subscriber')}}" method="post">
                @csrf
                <input
                  class="form-control"
                  type="email"
                  name="email"
                  required
                  placeholder="Your email here"
                />
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <button class="btn">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Footer Menu Start -->
  <div class="footer-menu">
    <div class="container">
      <div class="f-menu">
        <a href="">Terms of use</a>
        <a href="">Privacy policy</a>
        <a href="">Cookies</a>
        <a href="">Accessibility help</a>
        <a href="">Advertise with us</a>
        <a href="">Contact us</a>
      </div>
    </div>
  </div>
  <!-- Footer Menu End -->

  <!-- Footer Bottom Start -->
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 copyright">
          <p>
            Copyright &copy; <a href="">Your Site Name</a>. All Rights
            Reserved
          </p>
        </div>

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        <div class="col-md-6 template-by">
          <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
      </div>
    </div>
  </div>
 <!-- Back to Top -->
 <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    
  
  
   