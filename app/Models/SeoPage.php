<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    protected $table = "seo_pages";

    protected $fillable = [
        'id', 'title', 'description', 'slug', 'old_slug', 'info_header', 'state', 'city', 'type', 'info_footer', 'meta_description', 'keywords', 'title_google'
    ];
}
