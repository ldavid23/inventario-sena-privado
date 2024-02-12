<?php

namespace App\Http\Controllers;

use App\Models\Coordinaciones;
use App\Models\Funcionarios;
use Illuminate\Http\Request;
use App\Models\User;
class FuncionariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $funcionarios = Funcionarios::all();
        $coordinaciones = Coordinaciones::all();

        return view('funcionarios.index', compact('funcionarios', 'coordinaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'coordinacion_id' => 'required|numeric',
            'start_date' => 'required|date',
            'close_date' => 'required|date',
        ]);


        $userExisr = User::where('email', $request->email)->first();
        if (!$userExisr) {

            $usuario = User::factory()->create([
                'name' => $request->nombre,
                'email' => $request->email,
                'password' => bcrypt($request->email),
            ]);

            $user = User::where('email', $request->email)->first();


            $funcionario = Funcionarios::create([
                'start_date' => $request->start_date,
                'close_date' => $request->close_date,
                'user_id' => $user->id,
                'coordinacion_id' => $request->coordinacion_id

            ]);

            return redirect()->route('funcionarios') ->with('success', 'Funcionario Registrado');

        }else{
            return redirect()->route('funcionarios')
            ->with('error', 'Coordinacion Regisrada');
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'coordinacion_id' => 'required|numeric',
            'start_date' => 'required|date',
            'close_date' => 'required|date',
        ]);

        $funcionario = Funcionarios::where('id',$id)->first();

        $userExis = User::where('email', $request->email)->where('id' , '!=', $funcionario->user_id)->first();

        if (!$userExis) {
            $funcionario = Funcionarios::where('id', '=', $id)->update([
                'start_date' => $request->start_date,
                'close_date' => $request->close_date,
                'coordinacion_id' => $request->coordinacion_id
            ]);

            $funcionario = Funcionarios::where('id',$id)->first();


            $user = User::where('id', $funcionario->user_id)
            ->update([
                'name' => $request->nombre,
                'email' => $request->email,
                'password' => bcrypt($request->email),
            ]);

            return redirect()->route('funcionarios') ->with('success', 'Informacion Actualizada');

        }else{
            return redirect()->route('funcionarios')
            ->with('error', 'Identificacion Regisrada');
        }
    }

    public function destroy($id)
    {
        $funcionario = Funcionarios::find($id)->delete();

        return redirect()->route('funcionarios')
            ->with('success', 'Funcionario Eliminado');

    }





    
}
