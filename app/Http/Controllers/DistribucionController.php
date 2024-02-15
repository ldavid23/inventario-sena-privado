<?php

namespace App\Http\Controllers;

use App\Models\Distribucion;
use Illuminate\Http\Request;
use App\Models\Funcionarios;

class DistribucionController extends Controller
{


    public function index()
    {
        $funcionarios = Funcionarios::all();
        $valores = Distribucion::all();
        return view('distribucion.index', compact('funcionarios', 'valores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'funcionario_id'=> 'required',
            'mes' => 'required',
            'contratos' => 'required',
            'alternativas'=> 'required',
        ]);

        $distribucionExist = Distribucion::where('funcionario_id', '=', $request->funcionario_id)->where('mes', '=', $request->mes)->first();
        if (!$distribucionExist) {

            $asignacion = Distribucion::create([
                'funcionario_id'=> $request->funcionario_id,
                'mes' => $request->mes,
                'contratos' => $request->contratos,
                'alternativas'=> $request->alternativas,
                'total' => json_decode($request->contratos + $request->alternativas)
            ]);

            return redirect()->route('distribucion')
                ->with('success', 'Proceso Terminado Con Exito!');
        } else {

            return redirect()->route('distribucion')
                ->with('error', 'Este Instructor Ya Tiene Asignacion!');
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'funcionario_id'=> 'required',
            'mes' => 'required',
            'contratos' => 'required',
            'alternativas'=> 'required',
        ]);
        $distribucionExist = Distribucion::where('funcionario_id', '=', $request->funcionario_id)->where('mes', '=', $request->mes)->where('id', '!=', $id)->first();

        if (!$distribucionExist) {

            $asignacion = Distribucion::where('id', '=', $id)->update([
                'funcionario_id'=> $request->funcionario_id,
                'mes' => $request->mes,
                'contratos' => $request->contratos,
                'alternativas'=> $request->alternativas,
                'total' => json_decode($request->contratos + $request->alternativas)
            ]);

            return redirect()->route('distribucion')
                ->with('success', 'Proceso Terminado Con Exito!');
        } else {

            return redirect()->route('distribucion')
                ->with('error', 'Este Instructor Ya Tiene Asignacion!');
        }

    }

    public function destroy($id)
    {
        $coordinator = Distribucion::find($id)->delete();

        return redirect()->route('distribucion')
        ->with('success', 'Proceso Terminado Con Exito!');
    }
}

