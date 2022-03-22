<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','parent','status','page_title','page_metatags','page_seocescription','headerimg','headertxt',
        'description','image','firstrightimage','secondrightimage',
    ];   
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
