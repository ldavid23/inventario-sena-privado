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
        $funcionario=Funcionarios::all();
        $names=User::select('name')->where('id','=','funcionarios.user_id')->get();

        return view('anual.index', compact('anuals','funcionario','names'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
      

    }


    public function show(Anual $anual)
    {

    }


    public function edit(Anual $anual)
    {

    }


    public function update(Request $request, Anual $anual)
    {

    }


    public function destroy(Anual $anual)
    {

    }
}
