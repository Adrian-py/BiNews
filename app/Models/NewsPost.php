<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'likes');
    }

    public function newsTags(){
        return $this->belongsToMany(Tag::class, 'news_tags');
    }
}
