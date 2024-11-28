<?php

namespace App\Http\Controllers;

use App\Models\Informe; 
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index()
    {
        $informes = Informe::orderBy('idInforme', 'desc')->paginate();
        return view('informes.index', compact('informes'));
    }

    public function create()
    {
        return view('informes.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'idProyecto' => 'required|integer',
            'descripcionInforme' => 'required|string',
            'fechaEntrega' => 'required|date',
        ]);

        try {
            // Creación de nuevo informe
            Informe::create($request->all());
            // Redirección con mensaje de éxito
            return redirect()->route('informes.index')->with('success', 'Informe creado exitosamente.');
        } catch (\Exception $e) {
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al crear el registro: ' . $e->getMessage());
        }
    }

    public function show(Informe $informe)
    {
        return view('informes.show', compact('informe'));
    }

    public function edit($idInforme)
    {
        // Encuentra el informe por su ID
        $informe = Informe::findOrFail($idInforme);

        // Retorna la vista con los datos del informe a editar
        return view('informes.edit', compact('informe'));
    }

    public function update(Request $request, $idInforme)
    {
        // Validación de datos
        $request->validate([
            'idProyecto' => 'required|integer',
            'descripcionInforme' => 'required|string',
            'fechaEntrega' => 'required|date',
        ]);

        try {
            // Encuentra el informe por su ID y actualiza los datos
            $informe = Informe::findOrFail($idInforme);
            $informe->update($request->all());

            // Redirección con mensaje de éxito
            return redirect()->route('informes.show', $informe)->with('success', 'Informe actualizado exitosamente.');
        } catch (\Exception $e) {
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el registro: ' . $e->getMessage());
        }
    }

    public function destroy(Informe $informe)
    {
        $informe->delete();

        return redirect()->route('informes.index');
    }
}
