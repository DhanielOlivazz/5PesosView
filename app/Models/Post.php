<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \App\Models\Profile $profile
 * @property \App\Models\User|null $user
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'tags',
        'profile_id',
        'file',       
        'thumbnail',  
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    // Relaciones
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // Accesor para obtener el usuario directamente
    public function getUserAttribute()
    {
        return $this->profile ? $this->profile->user : null;
    }

    // Scope para filtrar por tag
    public function scopeWithTag($query, $tag)
    {
        return $query->whereJsonContains('tags', $tag);
    }
}
