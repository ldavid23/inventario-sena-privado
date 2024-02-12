<?php

namespace App\Http\Controllers;

use App\Models\Coordinaciones;
use Illuminate\Http\Request;
use App\Models\User;

class CoordinacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $coordinators = Coordinaciones::all();
        return view('coordinators.index', compact('coordinators'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coordinacion' => 'required|string',
            'encargado' => 'required|string',

        ]);

        $coordinators = Coordinaciones::where('coordinacion', '=', $request->coordinacion)->first();

        if (!$coordinators) {
            $Coordinacion = Coordinaciones::create([
                'coordinacion' => $request->coordinacion,
                'encargado' => $request->encargado,
            ]);
            return redirect()->route('coordinators')
                ->with('success', 'Proceso Terminado');
        } else {
            return redirect()->route('coordinators')
                ->with('error', 'Coordinacion Regisrada');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'coordinacion' => 'required|string',
            'encargado' => 'required|string',

        ]);

        $coordinators = Coordinaciones::where('coordinacion', '=', $request->coordinacion)->where('id', '!=', $id)->first();

        if (!$coordinators) {
            $coordinator = Coordinaciones::find($id);
            $coordinator->update($request->all());
            return redirect()->route('coordinators')
                ->with('success', 'Coordinator updated successfully.');

        } else {
            return redirect()->route('coordinators')
                ->with('error', 'Coordinacion Regisrada');
        }
    }

    public function destroy($id)
    {
        $coordinator = Coordinaciones::find($id)->delete();

        return redirect()->route('coordinators')
            ->with('success', 'Coordinator deleted successfully');

    }
}
