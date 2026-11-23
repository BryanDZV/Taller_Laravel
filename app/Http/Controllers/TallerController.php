<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //EXTRA RUTA DEBES CRAR SU GEt manuales sige convecion
    public function hojaTrabajo(int $id)
    {
        $reparacion = Reparacion::with(['cliente', 'mecanico.user'])->findOrFail($id);
        return view('tallers.hojaTrabajo', compact('reparacion'));
    }
    public function index()
    {
        //vista con filtrado
        $mecanicoId = Auth::user()->mecanico->id;

        $reparaciones = Reparacion::with('cliente')
            ->where('mecanico_id', $mecanicoId)
            ->whereDate('fecha_entrada', '>=', Carbon::today())
            ->orderBy('fecha_entrada', 'asc')
            ->get();

        return view('tallers.index', compact('reparaciones'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
