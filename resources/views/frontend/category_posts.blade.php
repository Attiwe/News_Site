@extends('layout.frontend.app')

@section('title')
{{$categorys->name}}
@endsection

@push('cononical')
    <link rel="canonical" href="{{url()->full()}}">
@endpush

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="{{route('frontend.post')}}">Home</a></li>
<li class="breadcrumb-item"><a  >{{$categorys->name}}</a></li>
@endsection
@section('body')

<br><br>
    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @forelse  ($posts as $post)
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="{{ asset($post->images->first()->path) }}" />
                                    <div class="mn-title">
                                        <a href=""> {{ $post->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="alert alert-danger">No posts found</div>
                            </div>
                        @endforelse
                        {{$posts->links()}}
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mn-list">
                        <h2>Read More</h2>
                        <ul>
                            @foreach ($categories  as $category)
                            <li><a href="{{route('frontend.category',$category->slug)}}"title='{{ $category->name }}'>{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News End-->

@endsection

