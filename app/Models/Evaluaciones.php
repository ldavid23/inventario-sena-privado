<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
    use HasFactory;

    static $rules = [
        'evaluation_date' => 'required',
        'evaluation_month' => 'required',
        'workplan'  => 'required',
        'partials' => 'required',
        'finals' => 'required',
        'extraordinary' => 'required',
        'funcionario_id'=> 'required',
    ];

    protected $fillable = [
        'evaluation_date',
        'evaluation_month',
        'workplan' ,
        'partials',
        'finals',
        'extraordinary',
        'funcionario_id',
    ];

    public function funcionario()
    {
        return $this->hasOne('App\Models\Funcionarios', 'id', 'funcionario_id');
    }
}
