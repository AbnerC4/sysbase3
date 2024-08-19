<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionClienteDataTable;
use App\Http\Requests\CreatecapacitacionClienteRequest;
use App\Http\Requests\UpdatecapacitacionClienteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionCliente;
use Illuminate\Http\Request;

class capacitacionClienteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Clientes')->only('show');
        $this->middleware('permission:Crear Capacitacion Clientes')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Clientes')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Clientes')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionCliente.
     */
    public function index(capacitacionClienteDataTable $capacitacionClienteDataTable)
    {
    return $capacitacionClienteDataTable->render('capacitacion_clientes.index');
    }


    /**
     * Show the form for creating a new capacitacionCliente.
     */
    public function create()
    {
        return view('capacitacion_clientes.create');
    }

    /**
     * Store a newly created capacitacionCliente in storage.
     */
    public function store(CreatecapacitacionClienteRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionCliente $capacitacionCliente */
        $capacitacionCliente = capacitacionCliente::create($input);

        flash()->success('Capacitacion Cliente guardado.');

        return redirect(route('capacitacionClientes.index'));
    }

    /**
     * Display the specified capacitacionCliente.
     */
    public function show($id)
    {
        /** @var capacitacionCliente $capacitacionCliente */
        $capacitacionCliente = capacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        return view('capacitacion_clientes.show')->with('capacitacionCliente', $capacitacionCliente);
    }

    /**
     * Show the form for editing the specified capacitacionCliente.
     */
    public function edit($id)
    {
        /** @var capacitacionCliente $capacitacionCliente */
        $capacitacionCliente = capacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        return view('capacitacion_clientes.edit')->with('capacitacionCliente', $capacitacionCliente);
    }

    /**
     * Update the specified capacitacionCliente in storage.
     */
    public function update($id, UpdatecapacitacionClienteRequest $request)
    {
        /** @var capacitacionCliente $capacitacionCliente */
        $capacitacionCliente = capacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        $capacitacionCliente->fill($request->all());
        $capacitacionCliente->save();

        flash()->success('Capacitacion Cliente actualizado.');

        return redirect(route('capacitacionClientes.index'));
    }

    /**
     * Remove the specified capacitacionCliente from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionCliente $capacitacionCliente */
        $capacitacionCliente = capacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        $capacitacionCliente->delete();

        flash()->success('Capacitacion Cliente eliminado.');

        return redirect(route('capacitacionClientes.index'));
    }
}
