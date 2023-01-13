<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function newsTags(){
        return $this->belongsToMany(NewsPost::class, 'news_tags');
    }
}
