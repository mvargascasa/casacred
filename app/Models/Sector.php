<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = "info_sector";

    protected $fillable = [
        'id', 'city_id', 'name'
    ];
}
