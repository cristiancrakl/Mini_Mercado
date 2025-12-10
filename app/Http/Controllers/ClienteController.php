<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ClienteRequest;




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
    public function store(ClienteRequest $request)
    {


        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('successMsg', 'El registro se creó exitosamente');

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
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        try {
            $cliente->nombre = $request->nombre;
            $cliente->tipo_documento = $request->tipo_documento;
            $cliente->numero_documento = $request->numero_documento;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->email = $request->email;
            // no cambiar estado ni registrado_por aquí a menos que venga en el request
            $cliente->save();
            return redirect()->route('clientes.index')->with('successMsg', 'El registro se actualizó exitosamente');
        } catch (QueryException $e) {
            Log::error('Error al actualizar el cliente: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors('Ocurrió un error en la base de datos al actualizar el registro.');
        } catch (Exception $e) {
            Log::error('Error inesperado al actualizar el cliente: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors('Ocurrió un error inesperado al actualizar el registro.');
        }
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
