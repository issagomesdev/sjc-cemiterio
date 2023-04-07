<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSetoreRequest;
use App\Http\Requests\UpdateSetoreRequest;
use App\Http\Resources\Admin\SetoreResource;
use App\Models\Setore;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetoresApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SetoreResource(Setore::with(['cemiterio', 'assinatura'])->get());
    }

    public function store(StoreSetoreRequest $request)
    {
        $setore = Setore::create($request->all());

        return (new SetoreResource($setore))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Setore $setore)
    {
        abort_if(Gate::denies('setore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SetoreResource($setore->load(['cemiterio', 'assinatura']));
    }

    public function update(UpdateSetoreRequest $request, Setore $setore)
    {
        $setore->update($request->all());

        return (new SetoreResource($setore))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Setore $setore)
    {
        abort_if(Gate::denies('setore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setore->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
