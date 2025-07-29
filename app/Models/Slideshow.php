<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;

    protected $table = 'slideshows';
    protected $fillable = [
        'image',
        'title_az',
        'title_en',
        'title_ru',
        'short_info_az',
        'short_info_en',
        'short_info_ru',
        'description_az',
        'description_en',
        'description_ru',
        'status'
    ];
}
