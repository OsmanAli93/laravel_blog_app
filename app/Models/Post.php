<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'title',
        'description',
        'slug',
        'message'
    ];

    public function profile ()
    {
        return $this->hasOne(Profile::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function likedBy (User $user) 
    {
        // Check if this post was liked by particular user
        return $this->likes->contains('user_id', $user->id);
    }

    public function likes ()
    {
        return $this->hasMany(Like::class);
    }
}
