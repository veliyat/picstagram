<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\User;

class UsersController extends Controller
{
    public function follow($userid) {
        Follower::create([
            'user_id' => $userid,
            'follower_id' => auth()->user()->id
        ]);

        return back();
    }

    public function unfollow($userid) {
        Follower::where([
            'user_id' => $userid,
            'follower_id' => auth()->user()->id
        ])->delete();

        return back();
    }
}
