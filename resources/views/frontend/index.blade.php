@extends('layout.frontend.app')

@section('title')
Home
@endsection

@section('body')
@php $lasts_post = $posts->take(3); @endphp
    <!-- Top News Start-->
    <div class="top-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="row tn-slider">
                        @foreach ($mostRead as $post )  
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img  style="height: 640px; width: 480px;" src="{{asset($post->images->first()->path)}}" />
                                <div class="tn-title">
                                    <a href="{{ route('frontend.show-posts', $post->slug)}}" title="{{ $post->title}}"> {{ $post->title }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @php $newPost = $posts->take(4); @endphp
                <div class="col-md-6 tn-right">
                    <div class="row">
                        @foreach ($newPost as $post )
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img style="height: 220px; width: 220px;" src="{{asset($post->images->first()->path)}}" />
                                <div class="tn-title">
                                    <a href="{{ route('frontend.show-posts', $post->slug)}}" title="{{ $post->title}}">  {{ $post->title }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top News End-->

    <!-- Category News Start-->

    <div class="cat-news">
        <div class="container">
            <div class="row">
                @foreach ($categoryWithPost as $category )
                <div class="col-md-6">
                    <h2> {{$category->name}} </h2>
                    <div class="row cn-slider">
                     @foreach ($category->posts as $post  )
                     <div class="col-md-6">
                        <div class="cn-img">
                            <img style="height: 220px; width: 220px;" src="{{asset($post->images->first()->path)}}" />
                            <div class="cn-title">
                                <a href="{{ route('frontend.show-posts', $post->slug)}}" title="{{ $post->title}}"> {{ $post->title }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach  
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Category News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
           
        </div>
    </div>
    <!-- Category News End-->

    <!-- Tab News Start-->
    <div class="tab-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#popular">Popular News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#latest">Oldes News</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="popular" class="container tab-pane active show">
                            @foreach ($popularNews as $popular)
                            <div class="tn-news">
                                <div class="tn-img">
                                    <img src="{{$popular->images->first()->path}}" />
                                </div>
                                <div class="tn-title">
                                    <a href="{{ route('frontend.show-posts', $popular->slug)}}" title="{{ $popular->title}}"> {{ $popular->title}}( {{ $popular->comments_count  }})</a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div id="latest" class="container tab-pane fade">
                            @foreach ($oldesNews as $olde)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="{{$olde->images->first()->path}}" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="{{ route('frontend.show-posts', $olde->slug)}}" title="{{ $olde->title}}"> {{$olde->title}} </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#m-viewed">:Lates Viewed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#m-read">Most Read</a>
                        </li>
                    </ul>

                     <div class="tab-content">
                        <div id="m-viewed" class="container tab-pane active">
                            @foreach ($lasts_post as $post)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="{{ $post->images->first()->path }}" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="{{ route('frontend.show-posts', $post->slug)}}" title="{{ $post->title}}"> {{ $post->title}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="m-read" class="container tab-pane fade">
                            @foreach ($mostRead as $most)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="{{ $most->images->first()->path }}" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="{{ route('frontend.show-posts', $most->slug)}}" title="{{ $most->title}}"> {{ $most->title}}</a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tab News Start-->

    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img style="height: 200px; width: 200px;"  src="{{$post->images->first()->path}}"  title="{{ $post->title}}" />
                                    <div class="mn-title">
                                        <a href="{{ route('frontend.show-posts', $post->slug)}}" title="{{ $post->title}}"> {{ $post->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$posts->links()}}
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mn-list">
                        <h2>Read More</h2>
                        <ul>
                            @foreach ($posts as $post)
                            <li><a href="{{ route('frontend.show-posts', $post->slug)}}" title="{{ $post->title}}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News End-->

@endsection