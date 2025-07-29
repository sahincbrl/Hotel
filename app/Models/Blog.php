<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title_image',
        'title_az',
        'title_en',
        'title_ru',
        'description_az',
        'description_en',
        'description_ru',
        'last_image',
        'status',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function blogImages(): HasMany
    {
        return $this->hasMany(BlogImage::class, 'blog_id', 'id');
    }
}
