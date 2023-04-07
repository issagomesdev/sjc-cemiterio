<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOssuarioRequest;
use App\Http\Requests\UpdateOssuarioRequest;
use App\Http\Resources\Admin\OssuarioResource;
use App\Models\Ossuario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OssuariosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ossuario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OssuarioResource(Ossuario::with(['cemiterio', 'assinatura'])->get());
    }

    public function store(StoreOssuarioRequest $request)
    {
        $ossuario = Ossuario::create($request->all());

        return (new OssuarioResource($ossuario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ossuario $ossuario)
    {
        abort_if(Gate::denies('ossuario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OssuarioResource($ossuario->load(['cemiterio', 'assinatura']));
    }

    public function update(UpdateOssuarioRequest $request, Ossuario $ossuario)
    {
        $ossuario->update($request->all());

        return (new OssuarioResource($ossuario))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ossuario $ossuario)
    {
        abort_if(Gate::denies('ossuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ossuario->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
