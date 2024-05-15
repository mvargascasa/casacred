<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info_state extends Model
{

    use HasFactory;
    protected $table = "info_states";

    protected $fillable = ['name', 'country_id'];
}
