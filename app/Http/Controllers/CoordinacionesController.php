<?php

namespace App\Http\Controllers;

use App\Models\Coordinaciones;
use Illuminate\Http\Request;
use App\Models\User;

class CoordinacionesController extends Controller
{


    public function index()
    {
        // Read - Display a list of items
        $coordinators = Coordinaciones::all();
        return view('coordinators.index', compact('coordinators'));
    }



    public function store(Request $request)
    {
        // Create - Save a new item to the database
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'coordinacion' => 'required|string',
        ]);

        $coordinators = Coordinaciones::where('coordinacion', '=', $request->coordinacion)->first();

        if (!$coordinators) {
            $usuarioExiste = User::where('email', '=', $request->email)->first();
            if (!$usuarioExiste) {

                $usuario = User::factory()->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->email),
                ]);

                $user_id = User::where('email', '=', $request->email)->first();


                $Coordinacion = Coordinaciones::create([
                    'coordinacion' => $request->name,
                    'user_id' => $user_id->id,
                ]);
                return redirect()->route('coordinators')
                ->with('success', 'Proceso Terminado');

            } else {
                return redirect()->route('coordinators')
                ->with('error', 'Funcionario Regisrado');
            }

        }else{
            return redirect()->route('coordinators')
            ->with('error', 'Coordinacion Regisrada');
    }
}



    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
        $request->validate([
            'coordinator_name' => 'string',
            'user_id' => 'numeric',
        ]);
        $coordinator = Coordinaciones::find($id);
        $coordinator->update($request->all());

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinator updated successfully.');
    }

    public function destroy($id)
    {
        // Delete - Remove an item from the database
        $coordinator = Coordinaciones::find($id);
        $coordinator->delete();

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinator deleted successfully');
    }
}
