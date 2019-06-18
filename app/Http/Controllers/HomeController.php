<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $followed = Follower::select('user_id')->where([
            'follower_id' => auth()->user()->id
        ])->get()->toArray();

        $userids = array_map(function($f) {
            return $f['user_id'];
        }, $followed);

        $posts = Post::whereIn('user_id', $userids)->orderBy('created_at', 'DESC')->simplePaginate(5);

        return view('home', compact('posts'));
    }
}
