<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Uso de modelo
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Consultar a los libros en la base de datos
     */
    public function index()
    {
        //Obtener los datos del modelo
        $libros = Libro::all();

        //Mandamos la informacion a la vista de index
        return  view('libros.index', compact('libros'));
    }

    /**
     * Retornar la vista del formulario de registro
     */
    public function create()
    {

        return view('libros.create');
    }

    /**
     * Guardar datos en la base de datos
     */
    public function store(Request $request)
    {
        //Esquema para enviar datos a la BD
        Libro::create([
            'nombre' => $request->nombre,
            'autor' => $request->autor,
            'editorial' => $request->editorial,
            'precio' => $request->precio,
        ]);

        //Enviar al usuario a otra pagina
        return redirect()->route('libros.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     *Consultar infromacion
     */
    public function edit(Libro $libro)
    {
        //Retronar vista con los datos del libro, aun no se reciben los datos aqui
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        //Realizar validaciones de los campos del formulario
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'precio' => 'required',
        ]);

        //Actualizar la informacion del libro en la base de datos
        $libro->update($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete(); //Eliminacion del registro

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado correctamente');
    }
}
