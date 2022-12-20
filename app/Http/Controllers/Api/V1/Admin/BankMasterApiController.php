<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankMasterRequest;
use App\Http\Requests\UpdateBankMasterRequest;
use App\Http\Resources\Admin\BankMasterResource;
use App\Models\BankMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BankMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankMasterResource(BankMaster::with(['team'])->get());
    }

    public function store(StoreBankMasterRequest $request)
    {
        $bankMaster = BankMaster::create($request->all());

        return (new BankMasterResource($bankMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BankMaster $bankMaster)
    {
        abort_if(Gate::denies('bank_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankMasterResource($bankMaster->load(['team']));
    }

    public function update(UpdateBankMasterRequest $request, BankMaster $bankMaster)
    {
        $bankMaster->update($request->all());

        return (new BankMasterResource($bankMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BankMaster $bankMaster)
    {
        abort_if(Gate::denies('bank_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
