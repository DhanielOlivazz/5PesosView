<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'file',
        'title',
        'description',
        'tags',
        'user_id'
    ];

    protected $casts = [
        'tags' => 'array', 
    ];
    
    //Relaciones
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function scopeWithTag($query, $tag)
    {
        return $query->whereJsonContains('tags', $tag);
    }
}
