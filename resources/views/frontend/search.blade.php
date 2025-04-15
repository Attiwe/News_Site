@extends('layout.frontend.app')


@push('cononical')
    <link rel="canonical" href="{{url()->full()}}">
@endpush

@section('title')
Search
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a>Search</a></li>
@endsection

@section('body')
<br>
    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($searchPosts as $post)
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="{{$post->images->first()->path }}" />
                                    <div class="mn-title">
                                        <a href="{{ route('frontend.show-posts', $post->slug)}}" title="{{ $post->title}}"> {{ $post->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$searchPosts->links()}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <!-- Main News End-->

@endsection

