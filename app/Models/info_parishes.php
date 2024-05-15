<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info_parishes extends Model
{
    use HasFactory;
    protected $table = "info_parishes";
    protected $fillable = ['city_id', 'name'];

    public function city()
    {
        return $this->belongsTo(info_city::class, 'city_id');
    }
}
