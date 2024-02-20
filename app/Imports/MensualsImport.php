<?php

namespace App\Imports;

use App\Models\Mensual;
use App\Models\User;
use App\Models\Funcionarios;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MensualsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(is_null($row['funcionario'])){
            return null;
        }

        $user = User::where('name','=',$row['funcionario'] ?? $row['nombre funcionario'])->first();
        $funcionario = Funcionarios::where('user_id','=',$user->id)->first();

        return new Mensual([
            'month' => $row['mes'] ?? $row['month'],
            'month_value' => $row['valor'] ?? $row['month_value'] ?? $row['value'],
            'funcionario_id' => $funcionario->id
        ]);
    }
}
