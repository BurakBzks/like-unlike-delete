@extends('layouts.admin')
@section('title')
    Post
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-wrapper">

        <div class="container-fluid">

            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="text-dark mb-1 w-1000 text-truncate font-weight-medium">POSTS</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="card-group">
                        <div class="card border-right">
                            <div class="card-body">
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea class="form-control" name="body" placeholder="Text Something!"
                                                  id="body" style="height: 100px"></textarea>
                                        <label for="body"></label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary m-3 ">POST</button>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-md-12">
                                        @if($posts->count())
                                        @foreach($posts as $post)
                                            <div class="post">
                                                <div class="wrap-ut pull-left">
                                                    <div class="userinfo pull-left">
                                                        <div class="vote_area">

                                                            <div class="m-2">
                                                                @auth()
                                                                    @if(!$post->likedBy(auth()->user()))
                                                                        <form action="{{route('post.like',$post)}}" method="post">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-success">Like &nbsp; &nbsp; </button>
                                                                        </form>
                                                                    @else
                                                                        <form action="{{route('post.destroy',$post)}}"
                                                                              method="post">
                                                                            @csrf
                                                                            @method('DELETE')

                                                                            <button type="submit" class="btn btn-danger">UnLike</button>
                                                                        </form>
                                                                    @endif
                                                                @endauth

                                                            </div>
                                                            <div class="">
                                                                <button class="btn btn-info" type="submit">Delete</button>

                                                            </div>




                                                        </div>
                                                        <div class="vote_count">

                                                        </div>
                                                    </div>
                                                    <div class="posttext pull-left">
                                                        <h2><a href=""></a></h2>
                                                        <p>{{$post->body}}</p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="postinfo pull-left">
                                                    <div class="comments">
                                                        <div class="commentbg">

                                                            <div class="mark"></div>
                                                            <a href="{{route('users.posts',$post->user)}}">{{$post->user->name}}</a>
                                                        </div>

                                                    </div>
                                                    <div class="views"><i class="mdi mdi-heart"></i>{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</div>
                                                    <div class="time"><i class="fa fa-clock-o"></i>{{$post->created_at}}</div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div><!-- POST -->
                                        @endforeach
                                            {{ $posts->links('pagination::bootstrap-4') }} {{--direk yazılmıyor ancak bu şekilde çalışıyor--}}
                                        @else
                                            <p> There are no post</p>
                                        @endif

                                    </div>
                                </div>

@endsection
@section('js')

@endsection
