<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSolicitanteRequest;
use App\Http\Requests\UpdateSolicitanteRequest;
use App\Http\Resources\Admin\SolicitanteResource;
use App\Models\Solicitante;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SolicitantesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('solicitante_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SolicitanteResource(Solicitante::with(['assinatura'])->get());
    }

    public function store(StoreSolicitanteRequest $request)
    {
        $solicitante = Solicitante::create($request->all());

        return (new SolicitanteResource($solicitante))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Solicitante $solicitante)
    {
        abort_if(Gate::denies('solicitante_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SolicitanteResource($solicitante->load(['assinatura']));
    }

    public function update(UpdateSolicitanteRequest $request, Solicitante $solicitante)
    {
        $solicitante->update($request->all());

        return (new SolicitanteResource($solicitante))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Solicitante $solicitante)
    {
        abort_if(Gate::denies('solicitante_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitante->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
