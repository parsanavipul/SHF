<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBankMasterRequest;
use App\Http\Requests\StoreBankMasterRequest;
use App\Http\Requests\UpdateBankMasterRequest;
use App\Models\BankMaster;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BankMasterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('bank_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BankMaster::with(['team'])->select(sprintf('%s.*', (new BankMaster())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'bank_master_show';
                $editGate = 'bank_master_edit';
                $deleteGate = 'bank_master_delete';
                $crudRoutePart = 'bank-masters';

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
            $table->editColumn('bankname', function ($row) {
                return $row->bankname ? $row->bankname : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.bankMasters.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('bank_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bankMasters.create');
    }

    public function store(StoreBankMasterRequest $request)
    {
        $bankMaster = BankMaster::create($request->all());

        return redirect()->route('admin.bank-masters.index');
    }

    public function edit(BankMaster $bankMaster)
    {
        abort_if(Gate::denies('bank_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankMaster->load('team');

        return view('admin.bankMasters.edit', compact('bankMaster'));
    }

    public function update(UpdateBankMasterRequest $request, BankMaster $bankMaster)
    {
        $bankMaster->update($request->all());

        return redirect()->route('admin.bank-masters.index');
    }

    public function show(BankMaster $bankMaster)
    {
        abort_if(Gate::denies('bank_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankMaster->load('team');

        return view('admin.bankMasters.show', compact('bankMaster'));
    }

    public function destroy(BankMaster $bankMaster)
    {
        abort_if(Gate::denies('bank_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankMasterRequest $request)
    {
        BankMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
