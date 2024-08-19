<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionServicioDataTable;
use App\Http\Requests\CreatecapacitacionServicioRequest;
use App\Http\Requests\UpdatecapacitacionServicioRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionServicio;
use Illuminate\Http\Request;

class capacitacionServicioController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Servicios')->only('show');
        $this->middleware('permission:Crear Capacitacion Servicios')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Servicios')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Servicios')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionServicio.
     */
    public function index(capacitacionServicioDataTable $capacitacionServicioDataTable)
    {
    return $capacitacionServicioDataTable->render('capacitacion_servicios.index');
    }


    /**
     * Show the form for creating a new capacitacionServicio.
     */
    public function create()
    {
        return view('capacitacion_servicios.create');
    }

    /**
     * Store a newly created capacitacionServicio in storage.
     */
    public function store(CreatecapacitacionServicioRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionServicio $capacitacionServicio */
        $capacitacionServicio = capacitacionServicio::create($input);

        flash()->success('Capacitacion Servicio guardado.');

        return redirect(route('capacitacionServicios.index'));
    }

    /**
     * Display the specified capacitacionServicio.
     */
    public function show($id)
    {
        /** @var capacitacionServicio $capacitacionServicio */
        $capacitacionServicio = capacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        return view('capacitacion_servicios.show')->with('capacitacionServicio', $capacitacionServicio);
    }

    /**
     * Show the form for editing the specified capacitacionServicio.
     */
    public function edit($id)
    {
        /** @var capacitacionServicio $capacitacionServicio */
        $capacitacionServicio = capacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        return view('capacitacion_servicios.edit')->with('capacitacionServicio', $capacitacionServicio);
    }

    /**
     * Update the specified capacitacionServicio in storage.
     */
    public function update($id, UpdatecapacitacionServicioRequest $request)
    {
        /** @var capacitacionServicio $capacitacionServicio */
        $capacitacionServicio = capacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        $capacitacionServicio->fill($request->all());
        $capacitacionServicio->save();

        flash()->success('Capacitacion Servicio actualizado.');

        return redirect(route('capacitacionServicios.index'));
    }

    /**
     * Remove the specified capacitacionServicio from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionServicio $capacitacionServicio */
        $capacitacionServicio = capacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        $capacitacionServicio->delete();

        flash()->success('Capacitacion Servicio eliminado.');

        return redirect(route('capacitacionServicios.index'));
    }
}
