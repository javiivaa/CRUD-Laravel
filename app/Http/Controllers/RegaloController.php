<?php

namespace App\Http\Controllers;

use App\Models\Regalo;
use Illuminate\Http\Request;

class RegaloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regalos = Regalo::orderBy('id','desc')->get();
        return view('index', compact('regalos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        // simple token check similar to middleware
        if ($request->query('token') !== 'demo') {
            return redirect()->route('regalos.index')->with('error', 'Token inválido');
        }

        Regalo::create($request->only('name'));
        return redirect()->route('regalos.index')->with('success', 'Regalo creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $regalo = Regalo::findOrFail($id);
        return view('show', compact('regalo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $regalo = Regalo::findOrFail($id);
        return view('edit', compact('regalo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|string|max:255']);

        if ($request->query('token') !== 'demo') {
            return redirect()->route('regalos.index')->with('error', 'Token inválido');
        }

        $regalo = Regalo::findOrFail($id);
        $regalo->update($request->only('name'));
        return redirect()->route('regalos.index')->with('success', 'Regalo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // NOTE: token check for safety
        request()->validate([]);
        if (request()->query('token') !== 'demo') {
            return redirect()->route('regalos.index')->with('error', 'Token inválido');
        }

        $regalo = Regalo::findOrFail($id);
        $regalo->delete();
        return redirect()->route('regalos.index')->with('success', 'Regalo eliminado');
    }
}
