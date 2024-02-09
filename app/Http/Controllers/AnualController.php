<?php

namespace App\Http\Controllers;

use App\Models\Anual;
use App\Models\Funcionarios;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AnualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $anuals = Anual::all();
        $funcionarios=Funcionarios::all();
        return view('anual.index', compact('anuals','funcionarios'));
    }


    public function store(Request $request)
    {
        request()->validate(Anual::$rules);

        $vaidate = Anual::where('funcionario_id', '=', $request->funcionario_id)->where('year', '=', $request->year)->first();

        if (!$vaidate) {

            $asignacion = Anual::create($request->all());

            return redirect()->route('anual')
                ->with('success', 'Proceso Terminado Con Exito!');
        } else {

            return redirect()->route('anual')
                ->with('error', 'Este Instructor Ya Tiene Asignacion!');
        }

    }

    public function update(Request $request, $id)
    {
        request()->validate(Anual::$rules);

        $vaidate = Anual::where('funcionario_id', '=', $request->funcionario_id)->where('year', '=', $request->year)->where('id', '!=', $id)->first();

        if (!$vaidate) {
            $asignacion = Anual::where('id', '=', $id)->update([
                'year' => $request->year,
                'year_value' => $request->year_value,
                'funcionario_id'  => $request->funcionario_id,
            ]);

            return redirect()->route('anual')
                ->with('success', 'Proceso Terminado Con Exito!');
        } else {

            return redirect()->route('anual')
                ->with('error', 'Este Instructor Ya Tiene Asignacion!');
        }
    }


    public function destroy($id)

        {
            $coordinator = Anual::find($id)->delete();

            return redirect()->route('anual')
            ->with('success', 'Proceso Terminado Con Exito!');
    }
}
