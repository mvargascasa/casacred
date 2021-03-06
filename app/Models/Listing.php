<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id', 'listing_title', 'product_code', 'slug', 'images',
        'meta_description','Front','Fund','land_area','construction_area', 'property_price_min','property_price',
        'listing_description','listing_type','address','state','city','listingtype',
        'listingcharacteristic','listinglistservices','listingtypestatus','listingtagstatus',
        'listyears',//se agrego esta nueva variable
        'lat', 'lng', //nuevas variables
        'available',
        'status','user_id',
        'threedegreeview','heading_details','owner_name',
    ];   
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
