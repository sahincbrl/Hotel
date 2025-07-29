<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'category_id',
        'title_image',
        'title_az',
        'title_en',
        'title_ru',
        'description_az',
        'description_en',
        'description_ru',
        'pricing_description_az',
        'pricing_description_en',
        'pricing_description_ru',
        'nightly_price',
        'monthly_price',
        'weekly_price',
        'weekend_price',
        'additional_price',
        'security_deposit_price',
        'bed_count',
        'bath_count',
        'wifi',
        'tv',
        'ac',
        'laundry',
        'dinner',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function roomImages(): HasMany
    {
        return $this->hasMany(RoomImage::class);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(RoomComment::class, 'room_id', 'id')
            ->where('status', 1);
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'room_id', 'id');
    }
}
