<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    protected $table = "seo_pages";

    protected $fillable = [
        'id', 'title', 'description', 'category', 'url_image', 'slug', 'old_slug', 'info_header', 'state', 'city', 'type', 'typestatus', 'info_footer', 'similarlinks', 'subtitle_if_general', 'similarlinks_g', 'meta_description', 'keywords', 'title_google'
    ];
}
