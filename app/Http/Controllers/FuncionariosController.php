<?php

namespace App\Http\Controllers;

use App\Models\Funcionarios;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function index()
    {
        // Read - Display a list of items
        $instructors = Funcionarios::all();

        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        // Create - Show the form to create a new item
        return view('instructors.create');
    }

    public function show($id)
    {
        // Read - Display a single item
        $instructor = Funcionarios::find($id);

        return view('instructors.show', compact('instructor'));
    }

    public function edit($id)
    {
        // Update - Show the form to edit an item
        $instructor = Funcionarios::find($id);

        return view('instructors.edit', compact('instructor'));
    }

    public function store(Request $request)
    {
        // Create - Save a new item to the database
        $request->validate([
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'start_date' => 'required|date',
            'close_date' => 'required|date',
            'user_id' => 'required|numeric',
            'coordinator_id' => 'required|numeric',
        ]);

        Funcionarios::create($request->all());

        return redirect()->route('instructors.index')
            ->with('success', 'Instructor created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
        $request->validate([
            'email' => 'email',
            'telephone' => 'numeric',
            'start_date' => 'date',
            'close_date' => 'date',
            'user_id' => 'numeric',
            'coordinator_id' => 'numeric',
        ]);
        $instructor = Funcionarios::find($id);
        $instructor->update($request->all());

        return redirect()->route('instructors.index')
            ->with('success', 'Instructor updated successfully.');
    }

    public function destroy($id)
    {
        // Delete - Remove an item from the database
        $instructor = Funcionarios::find($id);
        $instructor->delete();

        return redirect()->route('instructors.index')
            ->with('success', 'Instructor deleted successfully');
    }
}
