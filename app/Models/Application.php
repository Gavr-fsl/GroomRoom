<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable=[
        'nickname',
        'description',
        'user_id',
        'category_id',
        'photo',
    ];

}
