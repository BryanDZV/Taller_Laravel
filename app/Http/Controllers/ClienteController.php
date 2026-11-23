<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = Cliente::paginate(5);
        return view('gestions.vistaGestion', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //te manda al formulario si necesitas datos peudes pasarle
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $validated = $request->validate([
            'dni' => ['required', 'max:10', 'unique:clientes,dni,'],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'email' => ['nullable', 'email'],
        ]);


        //validamos personalizado
        //
        if (!Cliente::comprobarDniLibre($request->dni)) {
            return back()
                ->withErrors(['errors' => 'El DNI ya está registrado en el sistema'])
                ->withInput();
        }
        //creamos
        Cliente::create($validated);


        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //redirigir al la vista edición
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //validamos
        $validated = $request->validate([
            'dni' => ['required', 'max:10', Rule::unique('clientes', 'dni')->ignore($cliente->getKey())],
            'nombre' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'email' => ['nullable', 'email'],
        ]);

        $cliente->update($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //eleminr
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
