<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct() {
        $this->middleware('auth');    
    }

    public function store(User $user) {
        if(auth()->id() == $user->id) {
            abort(403, 'Unauthorized Action');
        }
        auth()->user()->following()->toggle($user->profile);
        $followers = $user->profile->followers->count();
        return response()->json(['followers' => $followers]);
    }
}
