<?php

namespace App\Http\Controllers;

use App\Models\Validacion;
use Illuminate\Http\Request;

class ValidacionController extends Controller
{
    public function index()
    {
        $validaciones = Validacion::orderBy('idValidacion', 'desc')->paginate();
        return view('validaciones.index', compact('validaciones'));
    }

    public function create()
    {
        return view('validaciones.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'idProyecto' => 'required|integer',
            'estadoValidacion' => 'required|string|max:50',
            'observaciones' => 'nullable|string',
            'fechaValidacion' => 'required|date',
        ]);

        try {
            // Creación de nueva validación
            $validacion = new Validacion();
            $validacion->idProyecto = $request->idProyecto;
            $validacion->estadoValidacion = $request->estadoValidacion;
            $validacion->observaciones = $request->observaciones;
            $validacion->fechaValidacion = $request->fechaValidacion;

            // Guardar en la base de datos
            $validacion->save();

            // Redirección con mensaje de éxito
            return redirect()->route('validaciones.index')->with('success', 'Validación creada exitosamente.');
        } catch (\Exception $e) {
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al crear la validación: ' . $e->getMessage());
        }
    }

    public function show(Validacion $validacion)
    {
        return view('validaciones.show', compact('validacion'));
    }

    public function edit($idValidacion)
    {
        // Encuentra la validación por su ID
        $validacion = Validacion::findOrFail($idValidacion);

        // Retorna la vista con los datos de la validación a editar
        return view('validaciones.edit', compact('validacion'));
    }

    public function update(Request $request, $idValidacion)
    {
        // Validación de datos
        $request->validate([
            'idProyecto' => 'required|integer',
            'estadoValidacion' => 'required|string|max:50',
            'observaciones' => 'nullable|string',
            'fechaValidacion' => 'required|date',
        ]);

        try {
            // Actualización de la validación
            $validacion = Validacion::findOrFail($idValidacion);
            $validacion->update($request->all());

            // Redirección con mensaje de éxito
            return redirect()->route('validaciones.index')->with('success', 'Validación actualizada exitosamente.');
        } catch (\Exception $e) {
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la validación: ' . $e->getMessage());
        }
    }
}
