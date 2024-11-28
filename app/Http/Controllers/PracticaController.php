<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;

class PracticaController extends Controller
{
    public function index()
    {
        $practicas = Practica::orderBy('id','desc')->paginate();
        return view('practicas.index', compact('practicas'));
    }

    public function create()
    {
        return view('practicas.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'codigo' => 'required|integer',
            'idestudiante' => 'required|integer',
            'iddocente' => 'required|integer',
            'idempresa' => 'required|integer',
            'idetapa' => 'required|integer',
            'titulo' => 'required|string|max:255',
        ]);

        try {
            // Creación de nueva práctica
            Practica::create($request->all());
            // Redirección con mensaje de éxito
            return redirect()->route('practicas.index')->with('success', 'Práctica creada exitosamente.');
        } catch (\Exception $e) {
        // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al crear el registro: ' . $e->getMessage());
        }
    }

    public function show(Practica $practica)
    {
        return view('practicas.show', compact('practica'));
        // compact se usa para enviar una variable a la vista
    }
    public function edit($id)
    {
        // Encuentra la práctica por su ID
        $practica = Practica::findOrFail($id);

        // Retorna la vista con los datos de la práctica a editar
        return view('practicas.edit', compact('practica'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'codigo' => 'required|integer',
            'idestudiante' => 'required|integer',
            'iddocente' => 'required|integer',
            'idempresa' => 'required|integer',
            'idetapa' => 'required|integer',
            'titulo' => 'required|string|max:255',
        ]);

        try {
            // Encuentra la práctica por su ID y actualiza los datos
            $practica = Practica::findOrFail($id);
            $practica->update($request->all());


            // Redirección con mensaje de éxito
            return redirect()->route('practicas.show', $practica)->with('success', 'Práctica actualizada exitosamente.');
        } catch (\Exception $e) {
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el registro: ' . $e->getMessage());
        }
    }
    public function destroy (Practica $practica){
        $practica->delete();

        return redirect()->route('practicas.index');
    }
}
