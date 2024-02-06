<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinators;

class CoordinatorsController extends Controller
{
    public function index()
    {
        // Read - Display a list of items
        $coordinators = Coordinators::all();

        return view('coordinators.index', compact('coordinators'));
    }

    public function create()
    {
        // Create - Show the form to create a new item
        return view('coordinators.create');
    }

    public function show($id)
    {
        // Read - Display a single item
        $coordinator = Coordinators::find($id);

        return view('coordinators.show', compact('coordinator'));
    }

    public function edit($id)
    {
        // Update - Show the form to edit an item
        $coordinator = Coordinators::find($id);

        return view('coordinators.edit', compact('coordinator'));
    }

    public function store(Request $request)
    {
        // Create - Save a new item to the database
        $request->validate([
            'coordinator_name' => 'required|string',
            'user_id' => 'required|numeric',
        ]);

        Coordinators::create($request->all());

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinators created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
        $request->validate([
            'coordinator_name' => 'string',
            'user_id' => 'numeric',
        ]);
        $coordinator = Coordinators::find($id);
        $coordinator->update($request->all());

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinator updated successfully.');
    }

    public function destroy($id)
    {
        // Delete - Remove an item from the database
        $coordinator = Coordinators::find($id);
        $coordinator->delete();

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinator deleted successfully');
    }
}
