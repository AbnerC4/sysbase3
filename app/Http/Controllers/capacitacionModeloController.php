<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionModeloDataTable;
use App\Http\Requests\CreatecapacitacionModeloRequest;
use App\Http\Requests\UpdatecapacitacionModeloRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionModelo;
use Illuminate\Http\Request;

class capacitacionModeloController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Modelos')->only('show');
        $this->middleware('permission:Crear Capacitacion Modelos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Modelos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Modelos')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionModelo.
     */
    public function index(capacitacionModeloDataTable $capacitacionModeloDataTable)
    {
    return $capacitacionModeloDataTable->render('capacitacion_modelos.index');
    }


    /**
     * Show the form for creating a new capacitacionModelo.
     */
    public function create()
    {
        return view('capacitacion_modelos.create');
    }

    /**
     * Store a newly created capacitacionModelo in storage.
     */
    public function store(CreatecapacitacionModeloRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionModelo $capacitacionModelo */
        $capacitacionModelo = capacitacionModelo::create($input);

        flash()->success('Capacitacion Modelo guardado.');

        return redirect(route('capacitacionModelos.index'));
    }

    /**
     * Display the specified capacitacionModelo.
     */
    public function show($id)
    {
        /** @var capacitacionModelo $capacitacionModelo */
        $capacitacionModelo = capacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        return view('capacitacion_modelos.show')->with('capacitacionModelo', $capacitacionModelo);
    }

    /**
     * Show the form for editing the specified capacitacionModelo.
     */
    public function edit($id)
    {
        /** @var capacitacionModelo $capacitacionModelo */
        $capacitacionModelo = capacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        return view('capacitacion_modelos.edit')->with('capacitacionModelo', $capacitacionModelo);
    }

    /**
     * Update the specified capacitacionModelo in storage.
     */
    public function update($id, UpdatecapacitacionModeloRequest $request)
    {
        /** @var capacitacionModelo $capacitacionModelo */
        $capacitacionModelo = capacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        $capacitacionModelo->fill($request->all());
        $capacitacionModelo->save();

        flash()->success('Capacitacion Modelo actualizado.');

        return redirect(route('capacitacionModelos.index'));
    }

    /**
     * Remove the specified capacitacionModelo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionModelo $capacitacionModelo */
        $capacitacionModelo = capacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        $capacitacionModelo->delete();

        flash()->success('Capacitacion Modelo eliminado.');

        return redirect(route('capacitacionModelos.index'));
    }
}
