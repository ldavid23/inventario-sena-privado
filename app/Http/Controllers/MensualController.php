<?php

namespace App\Http\Controllers;

use App\Imports\MensualsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mensual;
use Illuminate\Http\Request;
use App\Models\Funcionarios;

class MensualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mensuales = Mensual::all();
        $funcionarios = Funcionarios::all();
        return view('mensual.index', compact('mensuales', 'funcionarios'));
    }

    public function store(Request $request)
    {
        request()->validate(Mensual::$rules);

        $vaidate = Mensual::where('funcionario_id', '=', $request->funcionario_id)->where('month', '=', $request->month)->first();

        if (!$vaidate) {

            $asignacion = Mensual::create($request->all());

            return redirect()->route('mensual')
                ->with('success', 'Proceso Terminado Con Exito!');
        } else {

            return redirect()->route('mensual')
                ->with('error', 'Este Instructor Ya Tiene Asignacion!');
        }
    }

    public function update(Request $request, $id)
    {
        request()->validate(Mensual::$rules);

        $vaidate = Mensual::where('funcionario_id', '=', $request->funcionario_id)->where('month', '=', $request->month)->where('id', '!=', $id)->first();

        if (!$vaidate) {
            $asignacion = Mensual::where('id', '=', $id)->update([
                'month' => $request->month,
                'month_value' => $request->month_value,
                'funcionario_id'  => $request->funcionario_id,
            ]);

            return redirect()->route('mensual')
                ->with('success', 'Proceso Terminado Con Exito!');
        } else {

            return redirect()->route('mensual')
                ->with('error', 'Este Instructor Ya Tiene Asignacion!');
        }

    }


    public function destroy($id)
    {
        $coordinator = Mensual::find($id)->delete();

        return redirect()->route('mensual')
        ->with('success', 'Proceso Terminado Con Exito!');
    }

    public function import(Request $request)
    {
        $request->validate(['mensuals_excel' => 'required | mimes:xls,xlsx']);
        Excel::import(new MensualsImport, request()->file('mensuals_excel') );

        return redirect()->route('mensual')->with('success', 'Subida terminada con exito');
    }
}
