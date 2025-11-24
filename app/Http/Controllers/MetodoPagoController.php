<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoPago;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;


class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodoPagos = MetodoPago::all();
        return view('metodoPagos.index', compact('metodoPagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metodoPagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $metodoPago = MetodoPago::create($request->all());
        return redirect()->route('metodoPagos.index')->with('successMsg', 'El registro se creó exitosamente');
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
        $metodoPago = MetodoPago::findOrFail($id);
        return view('metodoPagos.edit', compact('metodoPago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $metodoPago = MetodoPago::findOrFail($id);
        $metodoPago->update($request->all());
        return redirect()->route('metodoPagos.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodoPago $metodoPago)
    {
        try {
            $metodoPago->delete();
            return redirect()->route('metodoPagos.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('metodoPagos.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('metodoPagos.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }

    public function cambioestadoMetodoPago(Request $request)
    {
        $metodoPago = MetodoPago::find($request->id);
        $metodoPago->estado = $request->estado;
        $metodoPago->save();
        return response()->json(['success' => true]);
    }
}
