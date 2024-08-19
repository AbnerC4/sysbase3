<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionEstadoDataTable;
use App\Http\Requests\CreatecapacitacionEstadoRequest;
use App\Http\Requests\UpdatecapacitacionEstadoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionEstado;
use Illuminate\Http\Request;

class capacitacionEstadoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Estados')->only('show');
        $this->middleware('permission:Crear Capacitacion Estados')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Estados')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Estados')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionEstado.
     */
    public function index(capacitacionEstadoDataTable $capacitacionEstadoDataTable)
    {
    return $capacitacionEstadoDataTable->render('capacitacion_estados.index');
    }


    /**
     * Show the form for creating a new capacitacionEstado.
     */
    public function create()
    {
        return view('capacitacion_estados.create');
    }

    /**
     * Store a newly created capacitacionEstado in storage.
     */
    public function store(CreatecapacitacionEstadoRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionEstado $capacitacionEstado */
        $capacitacionEstado = capacitacionEstado::create($input);

        flash()->success('Capacitacion Estado guardado.');

        return redirect(route('capacitacionEstados.index'));
    }

    /**
     * Display the specified capacitacionEstado.
     */
    public function show($id)
    {
        /** @var capacitacionEstado $capacitacionEstado */
        $capacitacionEstado = capacitacionEstado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        return view('capacitacion_estados.show')->with('capacitacionEstado', $capacitacionEstado);
    }

    /**
     * Show the form for editing the specified capacitacionEstado.
     */
    public function edit($id)
    {
        /** @var capacitacionEstado $capacitacionEstado */
        $capacitacionEstado = capacitacionEstado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        return view('capacitacion_estados.edit')->with('capacitacionEstado', $capacitacionEstado);
    }

    /**
     * Update the specified capacitacionEstado in storage.
     */
    public function update($id, UpdatecapacitacionEstadoRequest $request)
    {
        /** @var capacitacionEstado $capacitacionEstado */
        $capacitacionEstado = capacitacionEstado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        $capacitacionEstado->fill($request->all());
        $capacitacionEstado->save();

        flash()->success('Capacitacion Estado actualizado.');

        return redirect(route('capacitacionEstados.index'));
    }

    /**
     * Remove the specified capacitacionEstado from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionEstado $capacitacionEstado */
        $capacitacionEstado = capacitacionEstado::find($id);

        if (empty($capacitacionEstado)) {
            flash()->error('Capacitacion Estado no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        $capacitacionEstado->delete();

        flash()->success('Capacitacion Estado eliminado.');

        return redirect(route('capacitacionEstados.index'));
    }
}
