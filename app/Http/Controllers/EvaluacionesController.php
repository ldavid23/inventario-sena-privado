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
}
