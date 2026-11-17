<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    // Mostrar el listado de estudiantes y realizar búsquedas
    public function index(Request $request)
    {
        $busqueda = $request->input('buscar');

        $estudiantes = Estudiante::query()
            ->when($busqueda, function ($query, $busqueda) {
                $query->where('nombre', 'LIKE', "%{$busqueda}%")
                    ->orWhere('correo', 'LIKE', "%{$busqueda}%")
                    ->orWhere('programa', 'LIKE', "%{$busqueda}%");
            })
            ->get();

        return view('estudiantes.index', compact('estudiantes', 'busqueda'));
    }

    // Mostrar el formulario para registrar estudiantes
    public function create()
    {
        return view('estudiantes.create');
    }

    // Guardar un nuevo estudiante
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:80',
            'correo' => 'required|email|max:120|unique:estudiantes,correo',
            'edad' => 'required|integer|min:16|max:100',
            'programa' => [
                'required',
                'string',
                Rule::in(config('programas.programas')),
            ],
        ]);

        Estudiante::create($request->only([
            'nombre',
            'correo',
            'edad',
            'programa',
        ]));

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante registrado correctamente.');
    }

    // Mostrar el formulario para editar un estudiante
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    // Actualizar los datos de un estudiante
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|string|min:2|max:80',
            'correo' => [
                'required',
                'email',
                'max:120',
                Rule::unique('estudiantes', 'correo')->ignore($estudiante->id),
            ],
            'edad' => 'required|integer|min:16|max:100',
            'programa' => [
                'required',
                'string',
                Rule::in(config('programas.programas')),
            ],
        ]);

        $estudiante->update($request->only([
            'nombre',
            'correo',
            'edad',
            'programa',
        ]));

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente.');
    }

    // Mostrar la pantalla de confirmación antes de eliminar
    public function confirmar(Estudiante $estudiante)
    {
        return view('estudiantes.confirmar', compact('estudiante'));
    }

    // Eliminar un estudiante
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}
