<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensual extends Model
{
    use HasFactory;

    static $rules = [
        'month' => 'required',
        'month_value' => 'required',
        'funcionario_id'  => 'required',
    ];

    protected $fillable = [
        'month',
        'month_value',
        'funcionario_id',
    ];

    public function funcionario()
    {
        return $this->hasOne('App\Models\Funcionarios', 'id', 'funcionario_id');
    }

}
