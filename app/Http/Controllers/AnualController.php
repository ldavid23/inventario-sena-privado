<?php

namespace App\Http\Controllers;

use App\Models\Anual;
use Illuminate\Http\Request;

class AnualController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Anual $anual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anual $anual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anual $anual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anual $anual)
    {
        //
    }
}
