<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavbarItems extends Model
{
    use HasFactory;

    protected $table = "navbar_items";

    protected $fillable = [
        'name', 'category_name', 'items'
    ];
}
