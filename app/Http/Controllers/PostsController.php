<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;
use App\Like;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', [ 'except' => 'show' ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'posts work!';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => ['required'],
            'description' => ['required'],
            'picture' => ['required', 'image']
        ]);

        $imagePath = $data['picture']->store('posts', 'public');

        $data['picture'] = $imagePath;

        $image = Image::make($request->file('picture')->getRealPath())->fit(1200, 1200);
        $image->save('storage/thumbnails/'.$imagePath);

        auth()->user()->posts()->create($data);

        return redirect('/u/'.auth()->user()->username);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $p)
    {
        $like = Like::where([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'post_id' => $p->id
        ])->get();

        return view('posts.show', [
            'post' => $p,
            'user' => $p->user,
            'liked' => $like->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment(Request $request, Post $post) {
        $data = $request->validate([
            'comment' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;

        $post->comments()->create($data);

        return back();
    }

    public function like($uid, $pid) {
        $like = Like::where([
            'user_id' => $uid,
            'post_id' => $pid
        ]);

        if($like->get()->count()) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $uid,
                'post_id' => $pid
            ]);
        }

        return back();
    }
}
