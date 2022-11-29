<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "post";

    protected $fillable = [
        'id', 'status', 'reading_time', 'publication_title', 'slug', 'title_google', 'metadescription', 'keywords', 'content', 'first_image', 'second_image', 'created_at', 'updated_at'
    ];
}
