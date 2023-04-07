<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCemiterioRequest;
use App\Http\Requests\UpdateCemiterioRequest;
use App\Http\Resources\Admin\CemiterioResource;
use App\Models\Cemiterio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CemiteriosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cemiterio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CemiterioResource(Cemiterio::with(['assinatura'])->get());
    }

    public function store(StoreCemiterioRequest $request)
    {
        $cemiterio = Cemiterio::create($request->all());

        return (new CemiterioResource($cemiterio))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cemiterio $cemiterio)
    {
        abort_if(Gate::denies('cemiterio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CemiterioResource($cemiterio->load(['assinatura']));
    }

    public function update(UpdateCemiterioRequest $request, Cemiterio $cemiterio)
    {
        $cemiterio->update($request->all());

        return (new CemiterioResource($cemiterio))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cemiterio $cemiterio)
    {
        abort_if(Gate::denies('cemiterio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
