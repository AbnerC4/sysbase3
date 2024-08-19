<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionEquipoDataTable;
use App\Http\Requests\CreatecapacitacionEquipoRequest;
use App\Http\Requests\UpdatecapacitacionEquipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionEquipo;
use Illuminate\Http\Request;

class capacitacionEquipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Equipos')->only('show');
        $this->middleware('permission:Crear Capacitacion Equipos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Equipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Equipos')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionEquipo.
     */
    public function index(capacitacionEquipoDataTable $capacitacionEquipoDataTable)
    {
    return $capacitacionEquipoDataTable->render('capacitacion_equipos.index');
    }


    /**
     * Show the form for creating a new capacitacionEquipo.
     */
    public function create()
    {

        return view('capacitacion_equipos.create');
    }

    /**
     * Store a newly created capacitacionEquipo in storage.
     */
    public function store(CreatecapacitacionEquipoRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacionEquipo::create($input);

        flash()->success('Capacitacion Equipo guardado.');

        return redirect(route('capacitacionEquipos.index'));
    }

    /**
     * Display the specified capacitacionEquipo.
     */
    public function show($id)
    {
        /** @var capacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        return view('capacitacion_equipos.show')->with('capacitacionEquipo', $capacitacionEquipo);
    }

    /**
     * Show the form for editing the specified capacitacionEquipo.
     */
    public function edit($id)
    {
        /** @var capacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        return view('capacitacion_equipos.edit')->with('capacitacionEquipo', $capacitacionEquipo);
    }

    /**
     * Update the specified capacitacionEquipo in storage.
     */
    public function update($id, UpdatecapacitacionEquipoRequest $request)
    {
        /** @var capacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        $capacitacionEquipo->fill($request->all());
        $capacitacionEquipo->save();

        flash()->success('Capacitacion Equipo actualizado.');

        return redirect(route('capacitacionEquipos.index'));
    }

    /**
     * Remove the specified capacitacionEquipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = capacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        $capacitacionEquipo->delete();

        flash()->success('Capacitacion Equipo eliminado.');

        return redirect(route('capacitacionEquipos.index'));
    }
}
