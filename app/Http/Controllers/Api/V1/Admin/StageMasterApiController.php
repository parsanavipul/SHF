<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStageMasterRequest;
use App\Http\Requests\UpdateStageMasterRequest;
use App\Http\Resources\Admin\StageMasterResource;
use App\Models\StageMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StageMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stage_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StageMasterResource(StageMaster::with(['team'])->get());
    }

    public function store(StoreStageMasterRequest $request)
    {
        $stageMaster = StageMaster::create($request->all());

        return (new StageMasterResource($stageMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StageMaster $stageMaster)
    {
        abort_if(Gate::denies('stage_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StageMasterResource($stageMaster->load(['team']));
    }

    public function update(UpdateStageMasterRequest $request, StageMaster $stageMaster)
    {
        $stageMaster->update($request->all());

        return (new StageMasterResource($stageMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StageMaster $stageMaster)
    {
        abort_if(Gate::denies('stage_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stageMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
