<?php

namespace App\Http\Controllers;

use App\Models\Evaluaciones;
use Illuminate\Http\Request;
use App\Models\Funcionarios;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EvaluacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$evaluaciones = Evaluaciones::all();
        $evaluaciones = DB::table('evaluaciones')
            ->select('evaluaciones.id', 'evaluaciones.funcionario_id', 'evaluaciones.evaluation_date', 'evaluaciones.evaluation_month', 'evaluaciones.workplan', 'evaluaciones.partials', 'evaluaciones.finals', 'evaluaciones.extraordinary', DB::raw('SUM(evaluaciones.workplan + evaluaciones.partials + evaluaciones.finals + evaluaciones.extraordinary) as total_evaluations'), 'users.name as funcionario')
            ->join('funcionarios', 'evaluaciones.funcionario_id', '=', 'funcionarios.id')
            ->join('users', 'funcionarios.user_id', '=', 'users.id')
            ->groupBy('evaluaciones.id', 'evaluaciones.funcionario_id', 'evaluaciones.evaluation_date', 'evaluaciones.evaluation_month', 'evaluaciones.workplan', 'evaluaciones.partials', 'evaluaciones.finals', 'evaluaciones.extraordinary', 'users.name')
            ->get();


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
            $año = date('Y', strtotime($evaluation_date));


            Evaluaciones::create([
                'funcionario_id' => $request->funcionario_id,
                'evaluation_date' => $request->evaluation_date,
                'evaluation_month' => $nombre_mes,
                'evaluation_years' => $año,
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
            $año = date('Y', strtotime($evaluation_date));


            $send = Evaluaciones::where('id', '=', $id)->update([
                'funcionario_id' => $request->funcionario_id,
                'evaluation_date' => $request->evaluation_date,
                'evaluation_month' => $nombre_mes,
                'evaluation_years' => $año,
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




    /*
|--------------------------------------------------------------------------
|  GENERAR FECHAS
|--------------------------------------------------------------------------
*/

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

            Carbon::setLocale('es');

            $año = date('Y', strtotime($fecha));

            // Convert each date string to a Carbon date object
            $carbonDate = Carbon::createFromFormat('Y-m-d', $fecha);

            // Get the month name from the Carbon date object
            $nombre_mes = $carbonDate->format('F');

            // Create a new Evaluaciones instance and save it to the database
            $nuevaFecha = new Evaluaciones();
            $nuevaFecha->funcionario_id = $funcionario;
            $nuevaFecha->evaluation_date = $fecha;
            $nuevaFecha->evaluation_month = $nombre_mes;
            $nuevaFecha->evaluation_years = $año;
            $nuevaFecha->workplan = 0;
            $nuevaFecha->partials = 0;
            $nuevaFecha->finals = 0;
            $nuevaFecha->extraordinary = 0;
            $nuevaFecha->save();
        }

        return redirect()->route('evaluations')
            ->with('success', 'Evaluation deleted successfully');
    }





    /*
|--------------------------------------------------------------------------
| REPORTES
|--------------------------------------------------------------------------
*/

    public function reporte_mensual()
    {
        $evaluaciones = DB::table('evaluaciones')
            ->select('evaluaciones.funcionario_id', 'evaluaciones.evaluation_month', DB::raw('SUM(evaluaciones.workplan + evaluaciones.partials + evaluaciones.finals + evaluaciones.extraordinary) as total_evaluations'), 'users.name as funcionario', 'mensuals.month_value')
            ->join('funcionarios', 'evaluaciones.funcionario_id', '=', 'funcionarios.id')
            ->join('users', 'funcionarios.user_id', '=', 'users.id')
            ->join('mensuals', function ($join) {
                $join->on('evaluaciones.evaluation_month', '=', 'mensuals.month')
                    ->on('evaluaciones.funcionario_id', '=', 'mensuals.funcionario_id');
            })
            ->where('evaluaciones.workplan', '!=', 0)
            ->orWhere('evaluaciones.partials', '!=', 0)
            ->orWhere('evaluaciones.finals', '!=', 0)
            ->orWhere('evaluaciones.extraordinary', '!=', 0)
            ->groupBy('evaluaciones.funcionario_id', 'evaluaciones.evaluation_month', 'users.name', 'mensuals.month_value')
            ->get();


        $evaluacionesCalculadas = [];

        foreach ($evaluaciones as $evaluacion) {
            $total = ($evaluacion->total_evaluations * 100) / $evaluacion->month_value;
            $evaluacionesCalculadas[] = [
                'funcionario_id' => $evaluacion->funcionario_id,
                'evaluation_month' => $evaluacion->evaluation_month,
                'total_evaluations' => $evaluacion->total_evaluations,
                'funcionario' => $evaluacion->funcionario,
                'month_value' => $evaluacion->month_value,
                'calculated_total' => $total,
            ];

            return view('reportes.mensual', ['evaluaciones' => $evaluacionesCalculadas]);
        }
    }

    public function reporte_anual()
    {
        $evaluaciones = DB::table('evaluaciones')
        ->select('evaluaciones.funcionario_id', DB::raw('YEAR(evaluaciones.evaluation_date) as year'), DB::raw('SUM(evaluaciones.workplan + evaluaciones.partials + evaluaciones.finals + evaluaciones.extraordinary) as total_evaluations'), 'users.name as funcionario', 'anuals.year_value')
        ->join('funcionarios', 'evaluaciones.funcionario_id', '=', 'funcionarios.id')
        ->join('users', 'funcionarios.user_id', '=', 'users.id')
        ->join('anuals', function($join) {
            $join->on('evaluaciones.funcionario_id', '=', 'anuals.funcionario_id')
                 ->whereRaw('YEAR(evaluaciones.evaluation_date) = anuals.year');
        })
        ->where('evaluaciones.workplan', '!=', 0)
        ->orWhere('evaluaciones.partials', '!=', 0)
        ->orWhere('evaluaciones.finals', '!=', 0)
        ->orWhere('evaluaciones.extraordinary', '!=', 0)
        ->groupBy('evaluaciones.funcionario_id', 'year', 'users.name', 'anuals.year_value', 'evaluaciones.evaluation_date')
        ->get();



        // return response()->json($evaluaciones);
        return view('reportes.anual', compact('evaluaciones'));
    }
}
