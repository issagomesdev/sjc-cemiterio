<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoteRequest;
use App\Http\Requests\UpdateLoteRequest;
use App\Http\Resources\Admin\LoteResource;
use App\Models\Lote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LotesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoteResource(Lote::with(['cemiterio', 'setor', 'quadra', 'assinatura'])->get());
    }

    public function store(StoreLoteRequest $request)
    {
        $lote = Lote::create($request->all());

        return (new LoteResource($lote))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Lote $lote)
    {
        abort_if(Gate::denies('lote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoteResource($lote->load(['cemiterio', 'setor', 'quadra', 'assinatura']));
    }

    public function update(UpdateLoteRequest $request, Lote $lote)
    {
        $lote->update($request->all());

        return (new LoteResource($lote))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lote $lote)
    {
        abort_if(Gate::denies('lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lote->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
