<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;




use function Pest\Laravel\delete;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $cliente = Cliente::create($request->all());

        // $cliente = new Cliente();
        // $cliente->nombre = $request->nombre;
        // $cliente->tipo_documento = $request->tipo_documento;
        // $cliente->numero_documento = $request->numero_documento;
        // $cliente->direccion = $request->direccion;
        // $cliente->telefono = $request->telefono;
        // $cliente->email = $request->email;
        // $cliente->estado = 1; // Activo por defecto
        // $cliente->registrado_por = $request->user()->id;
        // $cliente->save();


        return redirect()->route('clientes.index')->with('successMsg', 'El registro se creó exitosamente');
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
    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el ciudad: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }

    public function cambioestadoCliente(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->estado = $request->estado;
        $cliente->save();
        return response()->json(['success' => true]);
    }
}
