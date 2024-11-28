<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;


class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::orderBy('idProyecto', 'desc')->paginate();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {

        return view('proyectos.create');
    }
    public function store(Request $request){
        // Validación de datos
        $request->validate([
            'nombreProyecto' => 'required|string|max:100',
            'descripcionProyecto' => 'required|string',
            'responsable' => 'required|string|max:100',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
        ]);

        try {
            // Creación de nuevo proyecto
            $proyecto = new Proyecto();
            $proyecto->nombreProyecto = $request->nombreProyecto;
            $proyecto->descripcionProyecto = $request->descripcionProyecto;
            $proyecto->responsable = $request->responsable;
            $proyecto->fechaInicio = $request->fechaInicio;
            $proyecto->fechaFin = $request->fechaFin;

            // Guardar en la base de datos
            $proyecto->save();

            // Redirección con mensaje de éxito
            return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente.');
        } catch (\Exception $e) {
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al crear el proyecto: ' . $e->getMessage());
        }
    }
        public function show(Proyecto $proyecto)
        {
            return view('proyectos.show', compact('proyecto'));
            // compact se usa para enviar una variable a la vista
        }
    public function edit($idProyecto)
    {
        // Encuentra la práctica por su ID
        $proyecto = Proyecto::findOrFail($idProyecto);

        // Retorna la vista con los datos de la práctica a editar
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, $idProyecto)
    {
        // Validación de datos
        $request->validate([
            'nombreProyecto' => 'required|string|max:100',
            'descripcionProyecto' => 'required|string',
            'responsable' => 'required|string|max:100',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
        ]);

        try {
            // Creación de nuevo proyecto
            $proyecto = Proyecto::findOrFail($idProyecto);
            $proyecto->update($request->all());
            // Redirección con mensaje de éxito
            return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente.');
        } catch (\Exception $e) {
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al crear el proyecto: ' . $e->getMessage());
        }
    }


}
