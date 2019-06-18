@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#people" role="button" aria-expanded="true" aria-controls="collapseExample">
                People
              </a>
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#posts" aria-expanded="false" aria-controls="collapseExample">
                Posts
              </button>
            </p>
            <div class="collapse show" id="people">
              <div class="card card-body">
                @foreach($profiles as $profile)
                    <a class="media text-dark" href="{{ route('profile', [ 'user' => $profile->user->username ]) }}" style="text-decoration: none">
                      <img class="img-thumbnail rounded-circle" src="{{ $profile->profilePicture() }}" class="mr-3" alt="{{$profile->title}}" width="100px">
                      <div class="pl-4 media-body">
                        <h5 class="mt-0">
                            <strong>{{ $profile->title }}</strong>
                        </h5>
                        {{ $profile->bio }}
                      </div>
                    </a>
                @endforeach
              </div>
            </div>

            <div class="collapse" id="posts">
              <div class="card card-body">
              @foreach($posts as $post)
                 <a href="{{ route('p.show', [ 'p' => $post->id ]) }}" class="media mt-4 text-dark" style="text-decoration: none">
                      <img class="img-thumbnail rounded-circle" src="{{ $post->postPicture() }}" class="mr-3" alt="{{$post->caption}}" width="100px">
                      <div class="pl-4 media-body">
                        <h5 class="mt-0">
                            <strong>{{ $post->caption }}</strong>
                        </h5>
                        {{ $post->description }}
                      </div>
                    </a>
                @endforeach
              </div>
            </div>
        <div>
    </div>
</div>
@endsection

