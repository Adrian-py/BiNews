<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    public function newsTags(){
        return $this->belongsToMany(NewsTags::class, "news_tags_id");
    }
}
