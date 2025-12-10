<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\OrdenCompra;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\DetalleFactura;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



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
        $ordenCompras = OrdenCompra::where('estado', '=', 1)->orderBy('numero_orden')->get();
        $productos = Producto::where('estado', '=', 1)->orderBy('nombre')->get();

        return view('facturas.create', compact('clientes', 'ordenCompras', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación básica
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'detalleProductos' => 'required|string',
            'total' => 'required|numeric',
            'iva' => 'nullable|numeric'
        ]);

        // Asegurar un valor por defecto para tipo_pago si no viene
        $tipoPago = $request->input('tipo_pago', 1);

        $detalleJson = $request->input('detalleProductos');
        $detalles = json_decode($detalleJson, true);

        if (!is_array($detalles) || count($detalles) === 0) {
            return redirect()->back()->withErrors('Agregue al menos un producto a la factura')->withInput();
        }

        DB::beginTransaction();
        try {
            $factura = Factura::create([
                'cliente_id' => $request->input('cliente_id'),
                'descuento' => $request->input('descuento', 0),
                'saldo_pendiente' => $request->input('saldo_pendiente', 0),
                'total' => $request->input('total'),
                'iva' => $request->input('iva', 0),
                'tipo_pago' => $tipoPago,
                'estado' => $request->input('estado', 1),
                'registrado_por' => $request->input('registrado_por', Auth::id()),
                'fecha' => $request->input('fecha')
            ]);

            // Guardar detalles
            foreach ($detalles as $d) {
                // Cada detalle esperado tiene: productoId, cantidad, precioUnitario, subtotal
                DetalleFactura::create([
                    'producto_id' => $d['productoId'] ?? $d['producto_id'] ?? null,
                    'factura_id' => $factura->id,
                    'cantidad' => $d['cantidad'] ?? 0,
                    'sub_total' => $d['subtotal'] ?? 0,
                    'registrado_por' => Auth::id()
                ]);
            }

            DB::commit();
            return redirect()->route('facturas.index')->with('successMsg', 'El registro se creó exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creando factura: ' . $e->getMessage());
            return redirect()->back()->withErrors('Ocurrió un error al guardar la factura.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $factura = Factura::with(['cliente', 'detalleFacturas.producto'])->findOrFail($id);
        return view('facturas.show', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::where('estado', '=', 1)->orderBy('nombre')->get();
        $ordenCompras = OrdenCompra::where('estado', '=', 1)->orderBy('numero_orden')->get();
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
