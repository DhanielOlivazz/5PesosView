<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";

    protected $fillable = [
        'picture',
        'description',
        'tastes',
        'location',
        'user_id'
    ];

    //Relations
    public function posts()
    {
        return $this->hasMany(Post::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
