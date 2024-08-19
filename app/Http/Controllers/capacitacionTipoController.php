<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionTipoDataTable;
use App\Http\Requests\CreatecapacitacionTipoRequest;
use App\Http\Requests\UpdatecapacitacionTipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionTipo;
use Illuminate\Http\Request;

class capacitacionTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Tipos')->only('show');
        $this->middleware('permission:Crear Capacitacion Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Tipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Tipos')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionTipo.
     */
    public function index(capacitacionTipoDataTable $capacitacionTipoDataTable)
    {
    return $capacitacionTipoDataTable->render('capacitacion_tipos.index');
    }


    /**
     * Show the form for creating a new capacitacionTipo.
     */
    public function create()
    {
        return view('capacitacion_tipos.create');
    }

    /**
     * Store a newly created capacitacionTipo in storage.
     */
    public function store(CreatecapacitacionTipoRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionTipo $capacitacionTipo */
        $capacitacionTipo = capacitacionTipo::create($input);

        flash()->success('Capacitacion Tipo guardado.');

        return redirect(route('capacitacionTipos.index'));
    }

    /**
     * Display the specified capacitacionTipo.
     */
    public function show($id)
    {
        /** @var capacitacionTipo $capacitacionTipo */
        $capacitacionTipo = capacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        return view('capacitacion_tipos.show')->with('capacitacionTipo', $capacitacionTipo);
    }

    /**
     * Show the form for editing the specified capacitacionTipo.
     */
    public function edit($id)
    {
        /** @var capacitacionTipo $capacitacionTipo */
        $capacitacionTipo = capacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        return view('capacitacion_tipos.edit')->with('capacitacionTipo', $capacitacionTipo);
    }

    /**
     * Update the specified capacitacionTipo in storage.
     */
    public function update($id, UpdatecapacitacionTipoRequest $request)
    {
        /** @var capacitacionTipo $capacitacionTipo */
        $capacitacionTipo = capacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        $capacitacionTipo->fill($request->all());
        $capacitacionTipo->save();

        flash()->success('Capacitacion Tipo actualizado.');

        return redirect(route('capacitacionTipos.index'));
    }

    /**
     * Remove the specified capacitacionTipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionTipo $capacitacionTipo */
        $capacitacionTipo = capacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        $capacitacionTipo->delete();

        flash()->success('Capacitacion Tipo eliminado.');

        return redirect(route('capacitacionTipos.index'));
    }
}
