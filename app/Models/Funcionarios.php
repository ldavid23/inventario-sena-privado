<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;

    static $rules = [
        'start_date'  => 'required',
        'close_date' => 'required',
        'user_id' => 'required',
        'coordinacion_id' => 'required',
    ];

    protected $fillable = [
        'email',
        'telephone',
        'start_date',
        'close_date',
        'user_id',
        'coordinacion_id',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


    public function coordinaciones()
    {
        return $this->belongsTo('App\Models\Coordinaciones', 'coordinacion_id', 'id');
    }
}
