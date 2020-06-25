@extends('layouts.app')

@section('content')

<div class="add-post">
    <a href="{{ route('p.create') }}" class="create-btn btn btn-primary btn-lg rounded-circle">
        <i class="fa fa-plus"></i>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('profiles.summary')

            <div class="row mt-4">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-3">
                        <div class="thumbnail-border">
                            <a href="{{ route('p.show', [ 'post' => $post->id ]) }}">
                                <div class="image">
                                   <img class="img img-responsive full-width" src="{{ $post->postPicture() }}" alt="{{ $post->caption }}">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
