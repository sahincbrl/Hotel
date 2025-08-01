<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'category_id', 'id');
    }
}
