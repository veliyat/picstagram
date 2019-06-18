@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="row mb-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('profile', [ 'user' => $post->username() ]) }}" class="text-dark" style="text-decoration: none">
                                    <img src="{{ $post->userProfilePic() }}" alt="{{ $post->username() }}" class="rounded-circle" height="40px">
                                    <strong class="ml-1">{{ $post->username() }}</strong>
                                </a>
                            </div>

                            <a href="{{ route('p.show', [ 'post' => $post->id ]) }}">
                              <img class="img-thumbnail" src="{{ $post->postPicture() }}" alt="{{ $post->caption }}">
                            </a>

                            <div class="card-body">
                                <strong>{{ $post->caption }}</strong>
                                <a href="@auth{{ route('p.like', [ 'uid' => Auth::user()->id, 'pid' => $post->id ]) }}@endauth" class="btn {{ $post->liked() ? 'btn-danger' : 'btn-light'}}">
                                    <i class="fa fa-heart"></i> <strong>{{ $post->likes()->count() }}</strong>
                                </a>
                                <p>{{ $post->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $posts->links() }}
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <img src="{{ Auth::user()->profile->profilePicture() }}" alt="{{ Auth::user()->username }}" class="rounded-circle" height="40px">
                    <strong class="ml-1">{{ Auth::user()->username }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
