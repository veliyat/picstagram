<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Post;

class SearchController extends Controller
{
    //
    public function results(Request $request) {
        $query = $request->get('query');

        $profiles = Profile::where('title', 'LIKE', "%$query%")
            ->orWhere('bio', 'LIKE', "%$query%")
            ->get();

        $posts = Post::where('caption', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return view('search.results', compact('profiles', 'posts'));
    }
}
