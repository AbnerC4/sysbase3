<?php

namespace App\Http\Controllers;

use App\DataTables\capacitacionUserDataTable;
use App\Http\Requests\CreatecapacitacionUserRequest;
use App\Http\Requests\UpdatecapacitacionUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\capacitacionUser;
use Illuminate\Http\Request;

class capacitacionUserController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Users')->only('show');
        $this->middleware('permission:Crear Capacitacion Users')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Users')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Users')->only('destroy');
    }
    /**
     * Display a listing of the capacitacionUser.
     */
    public function index(capacitacionUserDataTable $capacitacionUserDataTable)
    {
    return $capacitacionUserDataTable->render('capacitacion_users.index');
    }


    /**
     * Show the form for creating a new capacitacionUser.
     */
    public function create()
    {
        return view('capacitacion_users.create');
    }

    /**
     * Store a newly created capacitacionUser in storage.
     */
    public function store(CreatecapacitacionUserRequest $request)
    {
        $input = $request->all();

        /** @var capacitacionUser $capacitacionUser */
        $capacitacionUser = capacitacionUser::create($input);

        flash()->success('Capacitacion User guardado.');

        return redirect(route('capacitacionUsers.index'));
    }

    /**
     * Display the specified capacitacionUser.
     */
    public function show($id)
    {
        /** @var capacitacionUser $capacitacionUser */
        $capacitacionUser = capacitacionUser::find($id);

        if (empty($capacitacionUser)) {
            flash()->error('Capacitacion User no encontrado');

            return redirect(route('capacitacionUsers.index'));
        }

        return view('capacitacion_users.show')->with('capacitacionUser', $capacitacionUser);
    }

    /**
     * Show the form for editing the specified capacitacionUser.
     */
    public function edit($id)
    {
        /** @var capacitacionUser $capacitacionUser */
        $capacitacionUser = capacitacionUser::find($id);

        if (empty($capacitacionUser)) {
            flash()->error('Capacitacion User no encontrado');

            return redirect(route('capacitacionUsers.index'));
        }

        return view('capacitacion_users.edit')->with('capacitacionUser', $capacitacionUser);
    }

    /**
     * Update the specified capacitacionUser in storage.
     */
    public function update($id, UpdatecapacitacionUserRequest $request)
    {
        /** @var capacitacionUser $capacitacionUser */
        $capacitacionUser = capacitacionUser::find($id);

        if (empty($capacitacionUser)) {
            flash()->error('Capacitacion User no encontrado');

            return redirect(route('capacitacionUsers.index'));
        }

        $capacitacionUser->fill($request->all());
        $capacitacionUser->save();

        flash()->success('Capacitacion User actualizado.');

        return redirect(route('capacitacionUsers.index'));
    }

    /**
     * Remove the specified capacitacionUser from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var capacitacionUser $capacitacionUser */
        $capacitacionUser = capacitacionUser::find($id);

        if (empty($capacitacionUser)) {
            flash()->error('Capacitacion User no encontrado');

            return redirect(route('capacitacionUsers.index'));
        }

        $capacitacionUser->delete();

        flash()->success('Capacitacion User eliminado.');

        return redirect(route('capacitacionUsers.index'));
    }
}
