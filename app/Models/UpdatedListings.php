<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdatedListings extends Model
{
    use HasFactory;

    protected $table = "updated_listing";

    protected $fillable = [
        'id', 'listing_id', 'property_code', 'value_change', 'user_id', 'created_at', 'updated_at'
    ];
}
