<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenCompra;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;


class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenCompras = OrdenCompra::with('proveedor')->get();
        return view('ordenCompras.index', compact('ordenCompras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenCompras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ordenCompra = OrdenCompra::create($request->all());
        return redirect()->route('ordenCompras.index')->with('successMsg', 'El registro se creó exitosamente');
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
        $ordenCompra = OrdenCompra::findOrFail($id);
        return view('ordenCompras.edit', compact('ordenCompra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ordenCompra = OrdenCompra::findOrFail($id);
        $ordenCompra->update($request->all());
        return redirect()->route('ordenCompras.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenCompra $ordenCompra)
    {
        try {
            $ordenCompra->delete();
            return redirect()->route('facturas.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('facturas.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('facturas.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }

    public function cambioestadoOrdenCompra(Request $request)
    {
        $ordenCompra = OrdenCompra::find($request->id);
        $ordenCompra->estado = $request->estado;
        $ordenCompra->save();
        return response()->json(['success' => true]);
    }
}
