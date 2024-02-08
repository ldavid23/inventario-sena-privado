<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinaciones extends Model
{
    use HasFactory;

    static $rules = [
        'coordinacion' => 'required',
        'encargado'  => 'required',

    ];

    protected $fillable = [
        'coordinacion',
        'encargado'
    ];


}
