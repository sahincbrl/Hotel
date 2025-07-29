<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'room_id',
        'price',
        'name',
        'surname',
        'email',
        'mobile',
        'check_in',
        'check_out',
        'adult_count',
        'child_count',
        'is_apply',
    ];

    /**
     * @return HasOne
     */
    public function room(): HasOne
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }
}
