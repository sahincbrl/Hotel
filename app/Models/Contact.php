<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact_us';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_unread',
    ];
}
