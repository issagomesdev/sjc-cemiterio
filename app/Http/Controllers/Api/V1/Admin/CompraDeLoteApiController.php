<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompraDeLoteRequest;
use App\Http\Requests\UpdateCompraDeLoteRequest;
use App\Http\Resources\Admin\CompraDeLoteResource;
use App\Models\CompraDeLote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompraDeLoteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('compra_de_lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompraDeLoteResource(CompraDeLote::with(['falecido', 'assinatura'])->get());
    }

    public function store(StoreCompraDeLoteRequest $request)
    {
        $compraDeLote = CompraDeLote::create($request->all());

        return (new CompraDeLoteResource($compraDeLote))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CompraDeLote $compraDeLote)
    {
        abort_if(Gate::denies('compra_de_lote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompraDeLoteResource($compraDeLote->load(['falecido', 'assinatura']));
    }

    public function update(UpdateCompraDeLoteRequest $request, CompraDeLote $compraDeLote)
    {
        $compraDeLote->update($request->all());

        return (new CompraDeLoteResource($compraDeLote))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CompraDeLote $compraDeLote)
    {
        abort_if(Gate::denies('compra_de_lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compraDeLote->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
