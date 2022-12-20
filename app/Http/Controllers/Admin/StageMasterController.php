<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStageMasterRequest;
use App\Http\Requests\StoreStageMasterRequest;
use App\Http\Requests\UpdateStageMasterRequest;
use App\Models\StageMaster;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StageMasterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('stage_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StageMaster::with(['team'])->select(sprintf('%s.*', (new StageMaster())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'stage_master_show';
                $editGate = 'stage_master_edit';
                $deleteGate = 'stage_master_delete';
                $crudRoutePart = 'stage-masters';

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
            $table->editColumn('stage', function ($row) {
                return $row->stage ? $row->stage : '';
            });
            $table->editColumn('order', function ($row) {
                return $row->order ? $row->order : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.stageMasters.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('stage_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stageMasters.create');
    }

    public function store(StoreStageMasterRequest $request)
    {
        $stageMaster = StageMaster::create($request->all());

        return redirect()->route('admin.stage-masters.index');
    }

    public function edit(StageMaster $stageMaster)
    {
        abort_if(Gate::denies('stage_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stageMaster->load('team');

        return view('admin.stageMasters.edit', compact('stageMaster'));
    }

    public function update(UpdateStageMasterRequest $request, StageMaster $stageMaster)
    {
        $stageMaster->update($request->all());

        return redirect()->route('admin.stage-masters.index');
    }

    public function show(StageMaster $stageMaster)
    {
        abort_if(Gate::denies('stage_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stageMaster->load('team');

        return view('admin.stageMasters.show', compact('stageMaster'));
    }

    public function destroy(StageMaster $stageMaster)
    {
        abort_if(Gate::denies('stage_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stageMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyStageMasterRequest $request)
    {
        StageMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
