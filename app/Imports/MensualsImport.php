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
        $user = User::where('name','=',$row['funcionario'])->first();
        $funcionario = Funcionarios::where('user_id','=',$user->id)->first();

        return new Mensual([
            'month' => $row['mes'],
            'month_value' => $row['valor'],
            'funcionario_id' => $funcionario->id
        ]);
    }
}
