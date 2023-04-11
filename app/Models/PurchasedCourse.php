<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function course()
    {
        $this->hasOne(Course::class);
    }
}
