<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEntreLoteRequest;
use App\Http\Requests\UpdateEntreLoteRequest;
use App\Http\Resources\Admin\EntreLoteResource;
use App\Models\EntreLote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntreLotesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entre_lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EntreLoteResource(EntreLote::with(['solicitante', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'setor_destino', 'quadra_destino', 'lote_destino', 'assinatura'])->get());
    }

    public function store(StoreEntreLoteRequest $request)
    {
        $entreLote = EntreLote::create($request->all());

        return (new EntreLoteResource($entreLote))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EntreLote $entreLote)
    {
        abort_if(Gate::denies('entre_lote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EntreLoteResource($entreLote->load(['solicitante', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'setor_destino', 'quadra_destino', 'lote_destino', 'assinatura']));
    }

    public function update(UpdateEntreLoteRequest $request, EntreLote $entreLote)
    {
        $entreLote->update($request->all());

        return (new EntreLoteResource($entreLote))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EntreLote $entreLote)
    {
        abort_if(Gate::denies('entre_lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreLote->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
