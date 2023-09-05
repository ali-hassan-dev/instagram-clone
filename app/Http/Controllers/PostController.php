<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function create(Request $request) {
        if($request->userId != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        return view('posts.create')->with('userId', $request->userId);
    }

    public function show(Post $post) {
        $followStatus = auth()->user()->following->contains('user_id', $post->user->id);
        $followers = Cache::remember('count.followers.'. $post->user->id, now()->addSeconds(60), function() use ($post) {
            return $post->user->profile->followers->count();
        });
        return view('posts.show', compact('post', 'followers', 'followStatus'));
    }

    public function store(Request $request) {
        if($request->userId != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $validatedData = $request->validate([
            'caption' => 'string|max:255',
            'post_image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imageName = time(). '.' . $request->post_image->extension();
        $imagePath = $request->post_image->storeAs('post', $imageName, 'public');

        $image = Image::make(public_path('/storage/'.$imagePath))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $validatedData['caption'],
            'post_image' => $imagePath
        ]);

        return redirect('/profile/'.auth()->user()->id);

    }
}
