<div class="row">
    <div class="col col-md-4">
        <div class="mt-4 ml-4">
            <img class="rounded-circle" src="{{ $user->profile->profilePicture() }}" alt="{{ $user->profile->title }}" height="180px">
        </div>
    </div>

    <div class="col">
        <div class="row mt-4">
            <div class="col">
                <h2>
                    {{ $user->username }}

                    @include('profiles.follow')
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p><strong>{{ $user->profile->title }}</strong></p>
                <p>{{ $user->profile->bio }}</p>
                <p><a href="//{{ $user->profile->url }}" target="_blank">{{$user->profile->url}}</a></p>
            </div>
        </div>
    </div>
</div>
