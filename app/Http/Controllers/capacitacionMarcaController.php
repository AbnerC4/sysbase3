<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionMarcaDataTable;
use App\Http\Requests\CreatecapacitacionMarcaRequest;
use App\Http\Requests\UpdatecapacitacionMarcaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionMarca;
use Illuminate\Http\Request;

class capacitacionMarcaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Marcas')->only('show');
        $this->middleware('permission:Crear Capacitacion Marcas')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Marcas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Marcas')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionMarca.
     */
    public function index(capacitacionMarcaDataTable $capacitacionMarcaDataTable)
    {
    return $capacitacionMarcaDataTable->render('capacitacion_marcas.index');
    }


    /**
     * Show the form for creating a new capacitacionMarca.
     */
    public function create()
    {
        return view('capacitacion_marcas.create');
    }

    /**
     * Store a newly created capacitacionMarca in storage.
     */
    public function store(CreatecapacitacionMarcaRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionMarca $capacitacionMarca */
        $capacitacionMarca = capacitacionMarca::create($input);

        flash()->success('Capacitacion Marca guardado.');

        return redirect(route('capacitacionMarcas.index'));
    }

    /**
     * Display the specified capacitacionMarca.
     */
    public function show($id)
    {
        /** @var capacitacionMarca $capacitacionMarca */
        $capacitacionMarca = capacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        return view('capacitacion_marcas.show')->with('capacitacionMarca', $capacitacionMarca);
    }

    /**
     * Show the form for editing the specified capacitacionMarca.
     */
    public function edit($id)
    {
        /** @var capacitacionMarca $capacitacionMarca */
        $capacitacionMarca = capacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        return view('capacitacion_marcas.edit')->with('capacitacionMarca', $capacitacionMarca);
    }

    /**
     * Update the specified capacitacionMarca in storage.
     */
    public function update($id, UpdatecapacitacionMarcaRequest $request)
    {
        /** @var capacitacionMarca $capacitacionMarca */
        $capacitacionMarca = capacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        $capacitacionMarca->fill($request->all());
        $capacitacionMarca->save();

        flash()->success('Capacitacion Marca actualizado.');

        return redirect(route('capacitacionMarcas.index'));
    }

    /**
     * Remove the specified capacitacionMarca from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionMarca $capacitacionMarca */
        $capacitacionMarca = capacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        $capacitacionMarca->delete();

        flash()->success('Capacitacion Marca eliminado.');

        return redirect(route('capacitacionMarcas.index'));
    }
}
