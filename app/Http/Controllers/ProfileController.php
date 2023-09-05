<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['edit', 'update']);
    }

    public function index(User $user) {
        $followStatus = auth()->user() ? auth()->user()->following->contains('user_id', $user->id) : false;
        $following = Cache::remember('count.following.' . $user->id, now()->addSeconds(60), function() use ($user){
            return $user->following()->count();
        });
        $postsCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(60), function () use ($user) {
            return $user->posts->count();
        });
        $followers = Cache::remember('count.followers.'. $user->id, now()->addSeconds(60), function() use ($user) {
            return $user->profile->followers->count();
        });
        return view('profiles.index', compact('user', 'followStatus', 'followers', 'following', 'postsCount'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, Request $request) {
        $this->authorize('update', $user->profile);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'url' => 'url',
            'profile_image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if($request->profile_image) {
            $imageName = time(). '.' .$request->profile_image->extension();
            $imagePath = $request->profile_image->storeAs('profile', $imageName, 'public');

            $image = Image::make(public_path('/storage/'.$imagePath))->fit(1000, 1000);
            $image->save();
            $imageArray = ['profile_image' => $imagePath];
        }

        $user->profile()->update(array_merge(
            $validatedData,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");

    }
}
