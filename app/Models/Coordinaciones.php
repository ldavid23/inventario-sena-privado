<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'coordinacion',
        'user_id'
    ];

}
