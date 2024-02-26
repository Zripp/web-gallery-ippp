<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mendefinisika field yang boleh di isi
    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'status'];

    // Relasi ke category {Many to One}
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi Post ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relasi ke gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}


