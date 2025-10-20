<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \App\Models\User $user
 * @property \App\Models\Post[] $posts
 */
class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'picture',
        'description',
        'tastes',
        'location',
    ];

    protected $casts = [
        'tastes' => 'array',
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Accesor para la imagen
    public function getImageUrlAttribute()
    {
        if ($this->picture && $this->picture !== 'default.svg') {
            return asset('storage/' . $this->picture);
        }

        return asset('images/default.svg');
    }
}
