<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuadraRequest;
use App\Http\Requests\UpdateQuadraRequest;
use App\Http\Resources\Admin\QuadraResource;
use App\Models\Quadra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuadrasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quadra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuadraResource(Quadra::with(['cemiterio', 'setor', 'assinatura'])->get());
    }

    public function store(StoreQuadraRequest $request)
    {
        $quadra = Quadra::create($request->all());

        return (new QuadraResource($quadra))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Quadra $quadra)
    {
        abort_if(Gate::denies('quadra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuadraResource($quadra->load(['cemiterio', 'setor', 'assinatura']));
    }

    public function update(UpdateQuadraRequest $request, Quadra $quadra)
    {
        $quadra->update($request->all());

        return (new QuadraResource($quadra))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Quadra $quadra)
    {
        abort_if(Gate::denies('quadra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quadra->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
