@extends('layout.frontend.app')
@section('body')
<br>
<br>
<!-- Contact Start -->
<div class="contact">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="contact-form">
              <form action="{{route('frontend.sing-in')}}" method="post">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input
                        name="name"
                      type="text"
                      class="form-control"
                      placeholder="Your Name"
                      value="{{old('name')}}"
                    />
                    <strong class="text-danger">{{$errors->first('name')}}</strong>
                  </div>
                  <div class="form-group col-md-4">
                    <input
                        name="email"
                      type="email"
                      class="form-control"
                      placeholder="Your Email"
                      value="{{old('email')}}"
                    />
                    <strong class="text-danger">{{$errors->first('email')}}</strong>
                  </div>
                  <div class="form-group col-md-4 ">
                    <input
                      name="phone"
                      type="number"
                      class="form-control"
                      placeholder="Your Phone"
                      value="{{old('phone')}}"
                    />
                    <strong class="text-danger">{{$errors->first('phone')}}</strong>
                  </div>
                
                </div>
                <div class="form-group">
                  <input
                    name="title"
                    type="text"
                    class="form-control"
                    placeholder="title"
                  />
                  <strong class="text-danger">{{$errors->first('title')}}</strong>
                </div>
                <div class="form-group">
                  <textarea
                    name="body"
                    class="form-control"
                    rows="5"
                    placeholder="Message"
                    value="{{old('body')}}"
                  ></textarea>
                  <strong class="text-danger">{{$errors->first('body')}}</strong>
                </div>
                <div>
                  <button  title="Send Message" class="btn" type="submit">Send Message</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-info">
              <h3>Get in Touch</h3>
              <p class="mb-4">
                The contact form is currently inactive. Get a functional and
                working contact form with Ajax & PHP in a few minutes. Just copy
                and paste the files, add a little code and you're done.
               </p>
              <h4><i class="fa fa-map-marker"></i>{{$getSetting->street}} , {{$getSetting->city}} , {{$getSetting->country}}</h4>
              <h4><i class="fa fa-envelope"></i>{{$getSetting->email}}</h4>
              <h4><i class="fa fa-phone"></i>{{$getSetting->phone}}</h4>
              <div class="social">
                <a href="{{$getSetting->twitter}} " target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="{{$getSetting->facebook}} " target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="{{$getSetting->linkendin}} " target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                <a href="{{$getSetting->instagram}} " target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="{{$getSetting->youtube}} " target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->
@endsection
