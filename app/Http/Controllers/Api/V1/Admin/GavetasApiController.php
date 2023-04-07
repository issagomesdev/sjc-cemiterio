<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGavetumRequest;
use App\Http\Requests\UpdateGavetumRequest;
use App\Http\Resources\Admin\GavetumResource;
use App\Models\Gavetum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GavetasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gavetum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GavetumResource(Gavetum::with(['cemiterio', 'ossuario', 'assinatura'])->get());
    }

    public function store(StoreGavetumRequest $request)
    {
        $gavetum = Gavetum::create($request->all());

        return (new GavetumResource($gavetum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gavetum $gavetum)
    {
        abort_if(Gate::denies('gavetum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GavetumResource($gavetum->load(['cemiterio', 'ossuario', 'assinatura']));
    }

    public function update(UpdateGavetumRequest $request, Gavetum $gavetum)
    {
        $gavetum->update($request->all());

        return (new GavetumResource($gavetum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gavetum $gavetum)
    {
        abort_if(Gate::denies('gavetum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gavetum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
