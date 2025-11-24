<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\OrdenCompra;
use Illuminate\Http\Request;
use App\Models\Factura;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;



class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::with('cliente')->get();
        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::where('estado', '=', 1)->orderBy('nombre')->get();
        return view('facturas.create', compact('clientes'));

        $ordenCompras = OrdenCompra::where('estado', '=', 1)->orderBy('nombre')->get();
        return view('facturas.create', compact('ordenCompras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factura = Factura::create($request->all());
        return redirect()->route('facturas.index')->with('successMsg', 'El registro se creó exitosamente');
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
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::where('estado', '=', 1)->orderBy('nombre')->get();
        $ordenCompras = OrdenCompra::where('estado', '=', 1)->orderBy('nombre')->get();
        return view('facturas.edit', compact('factura', 'clientes', 'ordenCompras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->update($request->all());
        return redirect()->route('facturas.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        try {
            $factura->delete();
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

    public function cambioestadoFactura(Request $request)
    {
        $factura = Factura::find($request->id);
        $factura->estado = $request->estado;
        $factura->save();
        return response()->json(['success' => true]);
    }
}
