<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_menu extends Model
{
    use HasFactory;
    protected $table = 'table_menu';
    protected $fillable = [
        'restaurantname',
        'bestseller',
        'categories',
        'name',
        'price',
        'image',
    ];
}
