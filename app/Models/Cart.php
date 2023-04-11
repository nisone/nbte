<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function items()
    {
        $this->hasMany(CartItem::class);
    }

    public function courses()
    {
        $this->hasManyThrough(Course::class, CartItem::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
