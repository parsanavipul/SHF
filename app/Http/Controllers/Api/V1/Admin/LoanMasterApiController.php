<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanMasterRequest;
use App\Http\Requests\UpdateLoanMasterRequest;
use App\Http\Resources\Admin\LoanMasterResource;
use App\Models\LoanMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanMasterResource(LoanMaster::with(['bank', 'product', 'subproduct', 'customer', 'stage', 'dme_1', 'dme_2', 'dme_3', 'team'])->get());
    }

    public function store(StoreLoanMasterRequest $request)
    {
        $loanMaster = LoanMaster::create($request->all());

        return (new LoanMasterResource($loanMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LoanMaster $loanMaster)
    {
        abort_if(Gate::denies('loan_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanMasterResource($loanMaster->load(['bank', 'product', 'subproduct', 'customer', 'stage', 'dme_1', 'dme_2', 'dme_3', 'team']));
    }

    public function update(UpdateLoanMasterRequest $request, LoanMaster $loanMaster)
    {
        $loanMaster->update($request->all());

        return (new LoanMasterResource($loanMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LoanMaster $loanMaster)
    {
        abort_if(Gate::denies('loan_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
