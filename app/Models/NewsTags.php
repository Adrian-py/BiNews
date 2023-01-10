<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTags extends Model
{
    use HasFactory;

    public function newsPost(){
        return $this->belongsTo(NewsPost::class, "news_post_id");
    }

    public function tags(){
        return $this->hasOne(Tags::class, "tags_id");
    }
}
