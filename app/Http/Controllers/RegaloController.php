<?php

namespace App\Http\Controllers;

use App\Models\Regalo;
use App\Models\User;
use Illuminate\Http\Request;

class RegaloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load del user para evitar N+1
        $regalos = Regalo::with('user')->orderBy('id','desc')->get();
        return view('index', compact('regalos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255', 'user_id' => 'nullable|exists:users,id']);

        // El middleware ya valida token; aquí solo usamos Eloquent
        Regalo::create($data);
        return redirect()->route('regalos.index')->with('success', 'Regalo creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regalo $regalo)
    {
        // $regalo viene resuelto por route-model binding
        $regalo->load('user');
        return view('show', compact('regalo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regalo $regalo)
    {
        $users = User::all();
        return view('edit', compact('regalo','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regalo $regalo)
    {
        $data = $request->validate(['name' => 'required|string|max:255', 'user_id' => 'nullable|exists:users,id']);
        $regalo->update($data);
        return redirect()->route('regalos.index')->with('success', 'Regalo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regalo $regalo)
    {
        // El middleware ya maneja autorización simple
        $regalo->delete();
        return redirect()->route('regalos.index')->with('success', 'Regalo eliminado');
    }
}
