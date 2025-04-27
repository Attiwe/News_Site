<div class="row">

<!-- Content Column -->
<div class="col-lg-6 mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Last Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                         
                            <th>Categories</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($last_posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                 
                                <td>{{ $post->category->name }}</td>
                                <td class="text-primary" >{{ $post->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 

</div>

<div class="col-lg-6 mb-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Last Comments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead >
                        <tr>
                            <th>Post</th>
                            <th>Comment</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($last_comments as $comment)
                            <tr>
                                <td>{{ $comment->post->title }}</td>
                                <td>{{  Str::limit($comment->commit, 20)  }}</td>
                                <td class="text-primary" >{{ $comment->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
