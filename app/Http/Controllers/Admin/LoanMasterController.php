<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoanMasterRequest;
use App\Http\Requests\StoreLoanMasterRequest;
use App\Http\Requests\UpdateLoanMasterRequest;
use App\Models\BankMaster;
use App\Models\Customer;
use App\Models\LoanMaster;
use App\Models\ProductMaster;
use App\Models\StageMaster;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LoanMasterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('loan_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LoanMaster::with(['bank', 'product', 'subproduct', 'customer', 'stage', 'dme_1', 'dme_2', 'dme_3', 'team'])->select(sprintf('%s.*', (new LoanMaster())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'loan_master_show';
                $editGate = 'loan_master_edit';
                $deleteGate = 'loan_master_delete';
                $crudRoutePart = 'loan-masters';

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
            $table->addColumn('bank_bankname', function ($row) {
                return $row->bank ? $row->bank->bankname : '';
            });

            $table->addColumn('product_product_name', function ($row) {
                return $row->product ? $row->product->product_name : '';
            });

            $table->addColumn('subproduct_product_name', function ($row) {
                return $row->subproduct ? $row->subproduct->product_name : '';
            });

            $table->addColumn('customer_firstname', function ($row) {
                return $row->customer ? $row->customer->firstname : '';
            });

            $table->addColumn('stage_stage', function ($row) {
                return $row->stage ? $row->stage->stage : '';
            });

            $table->editColumn('application_no', function ($row) {
                return $row->application_no ? $row->application_no : '';
            });
            $table->editColumn('loan_account_no', function ($row) {
                return $row->loan_account_no ? $row->loan_account_no : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('loan_tenure', function ($row) {
                return $row->loan_tenure ? $row->loan_tenure : '';
            });
            $table->editColumn('is_self_connector', function ($row) {
                return $row->is_self_connector ? LoanMaster::IS_SELF_CONNECTOR_SELECT[$row->is_self_connector] : '';
            });
            $table->addColumn('dme_1_name', function ($row) {
                return $row->dme_1 ? $row->dme_1->name : '';
            });

            $table->addColumn('dme_2_name', function ($row) {
                return $row->dme_2 ? $row->dme_2->name : '';
            });

            $table->addColumn('dme_3_name', function ($row) {
                return $row->dme_3 ? $row->dme_3->name : '';
            });

            $table->editColumn('sanctioned_amount', function ($row) {
                return $row->sanctioned_amount ? $row->sanctioned_amount : '';
            });

            $table->editColumn('disbursement_amount', function ($row) {
                return $row->disbursement_amount ? $row->disbursement_amount : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'bank', 'product', 'subproduct', 'customer', 'stage', 'dme_1', 'dme_2', 'dme_3']);

            return $table->make(true);
        }

        $bank_masters    = BankMaster::get();
        $product_masters = ProductMaster::get();
        $customers       = Customer::get();
        $stage_masters   = StageMaster::get();
        $users           = User::get();
        $teams           = Team::get();

        return view('admin.loanMasters.index', compact('bank_masters', 'product_masters', 'customers', 'stage_masters', 'users', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('loan_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banks = BankMaster::pluck('bankname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = ProductMaster::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subproducts = ProductMaster::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('firstname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stages = StageMaster::pluck('stage', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dme_1s = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dme_2s = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dme_3s = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.loanMasters.create', compact('banks', 'customers', 'dme_1s', 'dme_2s', 'dme_3s', 'products', 'stages', 'subproducts'));
    }

    public function store(StoreLoanMasterRequest $request)
    {
        $loanMaster = LoanMaster::create($request->all());

        return redirect()->route('admin.loan-masters.index');
    }

    public function edit(LoanMaster $loanMaster)
    {
        abort_if(Gate::denies('loan_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banks = BankMaster::pluck('bankname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = ProductMaster::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subproducts = ProductMaster::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('firstname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stages = StageMaster::pluck('stage', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dme_1s = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dme_2s = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dme_3s = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $loanMaster->load('bank', 'product', 'subproduct', 'customer', 'stage', 'dme_1', 'dme_2', 'dme_3', 'team');

        return view('admin.loanMasters.edit', compact('banks', 'customers', 'dme_1s', 'dme_2s', 'dme_3s', 'loanMaster', 'products', 'stages', 'subproducts'));
    }

    public function update(UpdateLoanMasterRequest $request, LoanMaster $loanMaster)
    {
        $loanMaster->update($request->all());

        return redirect()->route('admin.loan-masters.index');
    }

    public function show(LoanMaster $loanMaster)
    {
        abort_if(Gate::denies('loan_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanMaster->load('bank', 'product', 'subproduct', 'customer', 'stage', 'dme_1', 'dme_2', 'dme_3', 'team');

        return view('admin.loanMasters.show', compact('loanMaster'));
    }

    public function destroy(LoanMaster $loanMaster)
    {
        abort_if(Gate::denies('loan_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoanMasterRequest $request)
    {
        LoanMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
