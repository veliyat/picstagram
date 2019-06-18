@extends('layouts.app')

@section('content')

<div class="add-post">
    <a href="{{ route('p.create') }}" class="btn btn-primary btn-lg rounded-circle">
        <i class="fa fa-plus"></i>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('profiles.summary')

            <div class="row mt-4">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('p.show', [ 'post' => $post->id ]) }}">
                            <img class="img-thumbnail" src="{{ $post->postPicture() }}" alt="{{ $post->caption }}">
                        </a>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
