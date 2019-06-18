@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 pr-0">
                <img class="img-thumbnail" src="{{ $post->postPicture() }}" alt="{{ $post->caption }}">
            </div>

            <div class="col pl-0">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ $post->userProfilePic() }}" alt="{{ $post->username() }}" class="rounded-circle" height="40px">
                        <strong class="ml-1">{{ $post->username() }}</strong>
                        @include('profiles.follow')
                    </div>
                    <div class="card-body">
                        <p><strong>{{ $post->caption }}</strong></p>
                        <p>{{ $post->description }}</p>

                        <a href="@auth{{ route('p.like', [ 'uid' => Auth::user()->id, 'pid' => $post->id ]) }}@endauth" class="btn {{ $liked ? 'btn-danger' : 'btn-light'}}">
                            <i class="fa fa-heart"></i> <strong>{{ $post->likes()->count() }}</strong>
                        </a>

                        <hr />
                        <div>
                            <h5>Comments</h5>
                            @if($post->comments()->count())
                                @foreach($post->comments as $commentObj)
                                    <p>
                                        <strong>{{$commentObj->user->username}}</strong>
                                        {{$commentObj->comment}}
                                    </p>
                                @endforeach
                            @else
                                <div class="alert alert-info">No comments to show</div>
                            @endif
                        </div>

                        @auth
                        <form action="{{ route('p.comment', [ 'post' => $post->id ]) }}" method="post">
                            @csrf
                            <input type="text" class="form-control" name="comment" placeholder="Add Comment...">
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
