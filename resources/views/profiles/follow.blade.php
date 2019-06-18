@if(Auth::user() && Auth::user()->username != $user->username )
    @if($user->isFollower(Auth::user()->id))
    <a href="{{ route('unfollow', ['user' => $user->id]) }}" class="btn btn-secondary btn-sm">Unfollow</a>
    @else
    <a href="{{ route('follow', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Follow</a>
    @endif
@endif
