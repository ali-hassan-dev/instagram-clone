<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'url', 'profile_image'];

    public function profileImage() {
        $imagePath = $this->profile_image ?? 'profile/default.JPG';
        return '/storage/' . $imagePath;  
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
