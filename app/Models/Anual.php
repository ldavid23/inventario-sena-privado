<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anual extends Model
{
    use HasFactory;


    static $rules = [
        'year' => 'required',
        'year_value' => 'required',
        'funcionario_id'  => 'required',
    ];

    protected $fillable = [
        'year',
        'year_value',
        'funcionario_id',
    ];
    public function funcionarios()
    {
        return $this->belongsTo('App\Models\Funcionarios', 'funcionario_id' , 'id');
    }
}

