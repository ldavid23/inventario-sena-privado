<?php

namespace App\Http\Controllers;

use App\Models\Evaluaciones;
use Illuminate\Http\Request;
use App\Models\Funcionarios;
use Illuminate\Support\Carbon;

class EvaluacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $evaluaciones = Evaluaciones::all();
        $funcionarios = Funcionarios::all();
        return view('evaluations.index', compact('evaluaciones', 'funcionarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'funcionario_id' => 'required|numeric',
            'evaluation_date' => 'required|date',
            'workplan' => 'required|numeric',
            'partials' => 'required|numeric',
            'finals' => 'required|numeric',
            'extraordinary' => 'required|numeric',
        ]);


        $evaluationExis = Evaluaciones::where('funcionario_id', '=', $request->funcionario_id)->where('evaluation_date', '=', $request->evaluation_date)->first();

        if (!$evaluationExis) {
            Carbon::setLocale('es');
            $evaluation_date = $request->input('evaluation_date');
            $carbonDate = Carbon::createFromFormat('Y-m-d', $evaluation_date);
            $nombre_mes = $carbonDate->format('F');

            Evaluaciones::create([
                'funcionario_id' => $request->funcionario_id,
                'evaluation_date' => $request->evaluation_date,
                'evaluation_month' => $nombre_mes,
                'workplan' => $request->workplan,
                'partials' => $request->partials,
                'finals' => $request->finals,
                'extraordinary' => $request->extraordinary,
            ]);

            return redirect()->route('evaluations')
                ->with('success', 'Evaluations created successfully.');
        } else {
            return redirect()->route('evaluations')
                ->with('error', 'Evaluations Regisrada');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'funcionario_id' => 'required|numeric',
            'evaluation_date' => 'required|date',
            'workplan' => 'required|numeric',
            'partials' => 'required|numeric',
            'finals' => 'required|numeric',
            'extraordinary' => 'required|numeric',
        ]);
        $evaluationExis = Evaluaciones::where('funcionario_id', '=', $request->funcionario_id)->where('evaluation_date', '=', $request->evaluation_date)->where('id', '!==', $id)->first();

        if (!$evaluationExis) {
            Carbon::setLocale('es');
            $evaluation_date = $request->input('evaluation_date');
            $carbonDate = Carbon::createFromFormat('Y-m-d', $evaluation_date);
            $nombre_mes = $carbonDate->format('F');

           $send = Evaluaciones::where('id', '=', $id)->update([
                'funcionario_id' => $request->funcionario_id,
                'evaluation_date' => $request->evaluation_date,
                'evaluation_month' => $nombre_mes,
                'workplan' => $request->workplan,
                'partials' => $request->partials,
                'finals' => $request->finals,
                'extraordinary' => $request->extraordinary,
            ]);

            return redirect()->route('evaluations')
                ->with('success', 'Evaluations created successfully.');
        } else {
            return redirect()->route('evaluations')
                ->with('error', 'Evaluations Regisrada');
        }
    }

    public function destroy($id)
    {
        $evaluation = Evaluaciones::find($id);
        $evaluation->delete();

        return redirect()->route('evaluations')
            ->with('success', 'Evaluation deleted successfully');
    }






    public function show()
    {
        $evaluaciones = Evaluaciones::all();
        $funcionarios = Funcionarios::all();
        return view('evaluations.create', compact('evaluaciones', 'funcionarios'));
    }



    public function generar(Request $request)
    {
        $fechas = json_decode($request->input('fechas_generadas'));

        $funcionario = json_decode($request->input('funcionario'));


        foreach ($fechas as $fecha) {

            // Convert each date string to a Carbon date object
            $carbonDate = Carbon::createFromFormat('Y-m-d', $fecha);

            // Get the month name from the Carbon date object
            $nombre_mes = $carbonDate->format('F');

            // Create a new Evaluaciones instance and save it to the database
            $nuevaFecha = new Evaluaciones();
            $nuevaFecha->funcionario_id = $funcionario;
            $nuevaFecha->evaluation_date = $fecha;
            $nuevaFecha->evaluation_month = $nombre_mes;
            $nuevaFecha->workplan = 0;
            $nuevaFecha->partials = 0;
            $nuevaFecha->finals = 0;
            $nuevaFecha->extraordinary = 0;
            $nuevaFecha->save();
        }

        return redirect()->route('evaluations')
        ->with('success', 'Evaluation deleted successfully');


    }

}
