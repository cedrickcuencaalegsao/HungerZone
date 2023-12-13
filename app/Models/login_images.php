<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_images extends Model
{
    use HasFactory;
    protected $table = 'tbl_image_login';
    protected $fillable = [
        'name',
        'image'
    ];
}
