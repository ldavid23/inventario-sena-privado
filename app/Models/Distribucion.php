<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribucion extends Model
{
    use HasFactory;

    static $rules = [
        'funcionario_id'=> 'required',
        'mes' => 'required',
        'contratos' => 'required',
        'alternativas'=> 'required',
        'total' => 'required',


    ];

    protected $fillable = [
        'funcionario_id',
        'mes',
        'contratos',
        'alternativas',
        'total,'
    ];


    public function funcionarios()
    {
        return $this->belongsTo('App\Models\Funcionarios', 'funcionario_id' , 'id');
    }


}
