<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulator extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_name',
        't_name',
        'issue_text',
        'solution_text',
        'date_occur',
        'date_fixed',
        'sim_type',
        'status',
    ];
}
