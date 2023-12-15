<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_delivery extends Model
{
    use HasFactory;
    protected $table = 'table_delivery';
    protected $fillable = [
        'status',
        'updated_at'
    ];
}
