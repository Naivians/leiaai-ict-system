<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeKeeping extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_time',
        'status',
        'total_hrs',
        'time_in',
        'time_out',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
