<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oportunidades extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';

    
    
    public function contact()
    {
        return $this->belongsTo(Contactos::class,'id_contacto');
    }
    
    public function creat()
    {
        return $this->belongsTo(User::class,'id_creador');
    }
    
    public function assig()
    {
        return $this->belongsTo(User::class,'id_assigned');
    }
    
    public function seg()
    {
        return $this->belongsTo(User::class,'id_seg');
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class,'id_opport');
    }
}
