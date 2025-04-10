@extends('layout.frontend.app')
 
 @section('title')
{{ $mainPosts->title   }}
@endsection
@section('breadcrumb')
@parent
 <li class="breadcrumb-item"><a> {{ $mainPosts->title}}</a></li>
 @endsection

@section('body')
<!-- Single News Start-->
<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Carousel -->
                <div id="newsCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#newsCarousel" data-slide-to="1"></li>
                        <li data-target="#newsCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./img/news-825x525.jpg" class="d-block w-100" alt="First Slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Lorem ipsum dolor sit amet</h5>
                                <p>
                                    laoreet. Aliquam vel felis felis. Proin sed sapien erat. Etiam a quam et metus
                                    tempor rutrum.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./img/news-825x525.jpg" class="d-block w-100" alt="First Slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Lorem ipsum dolor sit amet</h5>
                                <p>
                                    laoreet. Aliquam vel felis felis. Proin sed sapien erat. Etiam a quam et metus
                                    tempor rutrum.
                                </p>
                            </div>
                        </div>
                        <!-- Add more carousel-item blocks for additional slides -->
                    </div>
                    <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="top-news">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row tn-slider">

                                    @foreach ($mainPosts->images as $image)
                                     <div class="col-md-6">
                                        <div class="tn-img">
                                            <img src="{{ asset($image->path) }}" />
                                            <div class="tn-title">
                                                <a href="">{{ $image->title }} </a>
                                            </div>
                                        </div>
                                        <p class="tn-description">
                                            <strong class="text-primary">
                                                {!! $mainPosts->desc !!}
                                            </strong>
                                        </p>
                                    </div>
 
                                    @endforeach
 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 
                <!-- Comment Section -->
                <div class="comment-section">
                    <!-- Comment Input -->
                     @if($mainPosts-> comment_able == true)
                     <form  id="commentForm" >
                        @csrf
                     <div class="comment-input">
                        <input name="commit" type="text" placeholder="Add a comment..." id="commentBox" />
                        <input name="post_id" type="hidden" value="{{$mainPosts->id}}" />
                        
                        <input name="user_id" type="hidden" value=" {{$mainPosts->user->id}}" />
                       
                        <input name="ip_address" type="hidden" value="{{request()->ip()}}" />
                         <button title="Post" type="submit">Comment</button>
                    </div>
                 </form>
                 @else
                     <p class="text-danger" >Comments are disabled for this post.</p>
                     @endif

                     <!-- alert show error -->
                     <div style="display:none"  id='errorM' class="alert alert-danger" role="alert">       
                       </div>
                     
                    <!-- Display Comments -->

                    <div class="comments">
                        @foreach ($mainPosts->comments as $comment)
                        <div class="comment">
                            <img src="{{asset($comment->user->image)}}" alt=" {{ $comment->user->name }}" class="comment-img" />
                            <div class="comment-content">
                                <span class="username"> {{ $comment->user->name }} </span>
                                <p class="comment-text">{{$comment->commit}}</p> 
                            </div>
                        </div> 
                        @endforeach

                        <!-- Add more comments here for demonstration -->
                    </div>
                    @if($mainPosts->comments->count() > 0)
                          <div id="commentsContainer">
                            @foreach($mainPosts->comments as $comment)
                                <div class="comment">
                                    <img src="{{asset($comment->user->image)}}" alt="{{ $comment->user->name }}" class="comment-img" />
                                    <div class="comment-content">
                                        <span class="username">{{ $comment->user->name }}</span>
                                        <p class="comment-text">{{ $comment->commit }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button id="showMoreBtn" class="show-more-btn">Show more</button>
                    @else
                         <div id="commentsContainer"></div>
                        <button id="showMoreBtn" class="show-more-btn" style="display:none;">Show more</button>
                        <p id="noCommentsText">No comments yet</p>  
                    @endif                        
                </div>
             
                <!-- Related News -->
                <div class="sn-related">
                    <h2>Related News</h2>
                    <div class="row sn-slider">
                        @foreach ($category_posts as $posts)
                        <div class="col-md-4">
                            <div class="sn-img">
                                <img src="{{ asset($posts->images->first()->path) }}" class="img-fluid"
                                    alt="{{$posts->title}}" />
                                <div class="sn-title">
                                    <a href="{{route('frontend.show-posts', $posts->slug)}}"> {{ $posts->title }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h3 class="sw-title">In This Category</h3>
                        <hr>
                        <div class="news-list">
                            @foreach ($category_posts as $category_post)
                            <div class="nl-item">
                                <div class="nl-img">
                                    <img src="{{asset($category_post->images->first()->path)}}"
                                        alt='{{$category_post->title}}' />
                                </div>
                                <div class="nl-title">
                                    <a href="{{route('frontend.show-posts', $category_post->slug)}}"
                                        title="{{ $category_post->title }}"> {{ $category_post->title }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <div class="tab-news">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#featured">Popular</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- popular -->
                                <div id="featured" class="container tab-pane active">
                                    @foreach ($popular_posts as $popular_post)
                                    <div class="tn-news">
                                        <div class="tn-img">
                                            <img src="{{asset($popular_post->images->first()->path)}}"
                                                alt="{{$popular_post->title}}" />
                                        </div>
                                        <div class="tn-title">
                                            <a
                                                href="{{route('frontend.show-posts', $popular_post->slug)}}">{{$popular_post->title}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- latest -->
                                <div id="latest" class="container tab-pane fade">
                                    @foreach ($last_posts as $last_post)
                                    <div class="tn-news">
                                        <div class="tn-img">
                                            <img src="{{ asset($last_post->images->first()->path) }}" alt="{{$last_post->title}}" />
                                        </div>
                                        <div class="tn-title">
                                            <a href="{{route('frontend.show-posts', $last_post->slug)}}">{{$last_post->title}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h2 class="sw-title">News Category</h2>
                        <div class="category">
                            @foreach ($categories as $category)
                            <ul>
                                <li><a href=""> {{ $category->name }} </a><span>
                         ({{ $category->posts->count() }})</span></li><br>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single News End-->

@endsection

@push('js')
<script> 

        //    show More Comments
$(document).on('click', '#showMoreBtn', function(e) {
    e.preventDefault();
    $.ajax({
        url: "{{ route('frontend.show-more-comments', ['slug' => $mainPosts->slug]) }}",
        type: 'GET',
        success: function(data) {
            $('.comments').empty();
            $.each(data, function(key, $value){
                $('.comments').append(` 
                 <div class="comment">
                            <img src="${$value.user.image}" alt="${$value.user.name}" class="comment-img" />
                            <div class="comment-content">
                                <span class="username"> ${$value.user.name} </span>
                                <p class="comment-text">${$value.commit}</p>
                            </div>
                        </div> 
                `);
            });  
            $('#showMoreBtn').hide();
             
        },  
        error: function(data) {
            alert('error');
        }
    });
}); 

// add comment
$(document).off('submit', '#commentForm').on('submit', '#commentForm', function(e){
    e.preventDefault();

    var formData = new FormData(this);

     
    $('#submitCommentBtn').attr('disabled', true).text('جاري الإرسال...');

     $('#errorM').hide().text('');

    $.ajax({
        url: "{{ route('frontend.add-comment') }}",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            $('#commentBox').val(''); 

            $('.show-more-btn').before(`
                <div class="comment">
                    <img src="${data.comment.user.image}" alt="${data.comment.user.name}" class="comment-img" />
                    <div class="comment-content">
                        <span class="username"> ${data.comment.user.name} </span>
                        <p class="comment-text">${data.comment.commit}</p>
                    </div>
                </div>
            `);
 
             $('#submitCommentBtn').attr('disabled', false).text('إرسال');
        },

        error: function(data){
            var response = $.parseJSON(data.responseText);

            if(response.errors && response.errors.commit){
                $('#errorM').text(response.errors.commit).show();
            }

             $('#submitCommentBtn').attr('disabled', false).text('إرسال');
        }
    });
});

</script>
@endpush    
