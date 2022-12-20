<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserTypeRequest;
use App\Http\Requests\StoreUserTypeRequest;
use App\Http\Requests\UpdateUserTypeRequest;
use App\Models\Team;
use App\Models\UserType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UserTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = UserType::with(['team'])->select(sprintf('%s.*', (new UserType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'user_type_show';
                $editGate = 'user_type_edit';
                $deleteGate = 'user_type_delete';
                $crudRoutePart = 'user-types';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('user_type', function ($row) {
                return $row->user_type ? $row->user_type : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.userTypes.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userTypes.create');
    }

    public function store(StoreUserTypeRequest $request)
    {
        $userType = UserType::create($request->all());

        return redirect()->route('admin.user-types.index');
    }

    public function edit(UserType $userType)
    {
        abort_if(Gate::denies('user_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userType->load('team');

        return view('admin.userTypes.edit', compact('userType'));
    }

    public function update(UpdateUserTypeRequest $request, UserType $userType)
    {
        $userType->update($request->all());

        return redirect()->route('admin.user-types.index');
    }

    public function show(UserType $userType)
    {
        abort_if(Gate::denies('user_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userType->load('team', 'userTypeUsers');

        return view('admin.userTypes.show', compact('userType'));
    }

    public function destroy(UserType $userType)
    {
        abort_if(Gate::denies('user_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userType->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserTypeRequest $request)
    {
        UserType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
