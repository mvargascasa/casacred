<?php

namespace App\Models;

use App\Enums\NotificationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    
    protected $table = 'notifications';

    protected $fillable = [
        'type',
        'title',
        'content',
        'user_ids',
        'viewed_by',
        'is_read'
    ];

    protected $casts = [
        // 'type' => NotificationType::class,
        'user_ids' => 'array',
        'viewed_by' => 'array',
        'is_read' => 'boolean'
    ];

}
