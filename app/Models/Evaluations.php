<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluation_id',
        'evaluation_date',
        'evaluation_month',
        'workplan',
        'partials',
        'finals',
        'extraordinary',
        'instructor_id'
    ];
}
