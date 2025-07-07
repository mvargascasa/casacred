<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id', 'listing_title', 'product_code', 'slug', 'images', 'video', //nueva variable video
        'bedroom', 'bathroom', 'garage', //new variables to filters
        'meta_description', 'keywords', 'Front','Fund','land_area','construction_area', 'property_price_min','property_price',
        'listing_description','listing_type', 'num_factura', 'address','state','city','listingtype',
        'sector', // nueva variable para select dinamico
        'listingcharacteristic','listinglistservices','listingtypestatus','listingtagstatus', 'listinggeneralcharacteristics', 'listingenvironments',
        'listyears',//se agrego esta nueva variable
        'lat', 'lng', //nuevas variables se quito lat y lng como variables
        //'ubication_url', //se agrego esto para la ubicacion
        'available',
        'status','user_id',
        'threedegreeview','heading_details','owner_name', 'owner_email', 'owner_address',
        'identification', 'phone_number', // new variables to save cedula and numero telefonico
        'aval', //new variable to avaluo
        'locked',
        'vip',
        'planing_license',
        'mortgaged',
        'entity_mortgaged',
        'mount_mortgaged',
        'cadastral_key',
        'aliquot',
        'observations_type_property',
        'cavity_error',
        'warranty',
        'plusvalia',
        'niv_constr', 'num_pisos', 'pisos_constr', // nuevas variables para las caracteristicas generales
        'land_appraisal', 'construction_appraisal',
        'delete_at',
        'posted_on_facebook',
        'date_posted_facebook',
        'contact_at',
        'is_dual_operation'
    ];   
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeFilterByState($query, $state){
        if($state){
            return $query->where('state', 'LIKE', $state);
        }
    }

    public function scopeFilterByCity($query, $city){
        if($city){
            return $query->where('city', 'LIKE', "%$city%");
        }
    }

    public function scopeFilterByListingTitle($query, $ubication){
        if($ubication){
            return $query->where('listing_title', 'LIKE', "%$ubication%");
        }
    }
    
}
