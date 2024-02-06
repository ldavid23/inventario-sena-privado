<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructors extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'telephone',
        'start_date',
        'close_date',
        'user_id',
        'coordinator_id'
    ];

}
