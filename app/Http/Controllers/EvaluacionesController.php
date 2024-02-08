<?php

namespace App\Http\Controllers;

use App\Models\Evaluaciones;
use Illuminate\Http\Request;

class EvaluacionesController extends Controller
{
    public function index()
    {
        // Read - Display a list of items
        $evaluations = Evaluaciones::all();

        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        // Create - Show the form to create a new item
        return view('evaluations.create');
    }

    public function show($id)
    {
        // Read - Display a single item
        $evaluation = Evaluaciones::find($id);

        return view('evaluations.show', compact('evaluation'));
    }

    public function edit($id)
    {
        // Update - Show the form to edit an item
        $evaluation = Evaluaciones::find($id);

        return view('evaluations.edit', compact('evaluation'));
    }

    public function store(Request $request)
    {
        // Create - Save a new item to the database
        $request->validate([
            'evaluation_date' => 'required|date',
            'evaluation_month' => 'required|string',
            'workplan' => 'required|numeric',
            'partials' => 'required|numeric',
            'finals' => 'required|numeric',
            'extraordinary' => 'required|numeric',
            'instructors_id' => 'required|numeric',
        ]);

        Evaluaciones::create($request->all());

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluations created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
        $request->validate([
            'evaluation_date' => 'date',
            'evaluation_month' => 'string',
            'workplan' => 'numeric',
            'partials' => 'numeric',
            'finals' => 'numeric',
            'extraordinary' => 'numeric',
            'instructors_id' => 'numeric',
        ]);
        $evaluation = Evaluaciones::find($id);
        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation updated successfully.');
    }

    public function destroy($id)
    {
        // Delete - Remove an item from the database
        $evaluation = Evaluaciones::find($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation deleted successfully');
    }
}
