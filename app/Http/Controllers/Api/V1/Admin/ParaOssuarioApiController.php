<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParaOssuarioRequest;
use App\Http\Requests\UpdateParaOssuarioRequest;
use App\Http\Resources\Admin\ParaOssuarioResource;
use App\Models\ParaOssuario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParaOssuarioApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('para_ossuario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParaOssuarioResource(ParaOssuario::with(['solicitante', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'ossuario_destino', 'gaveta_destino', 'assinatura'])->get());
    }

    public function store(StoreParaOssuarioRequest $request)
    {
        $paraOssuario = ParaOssuario::create($request->all());

        return (new ParaOssuarioResource($paraOssuario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ParaOssuario $paraOssuario)
    {
        abort_if(Gate::denies('para_ossuario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParaOssuarioResource($paraOssuario->load(['solicitante', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'ossuario_destino', 'gaveta_destino', 'assinatura']));
    }

    public function update(UpdateParaOssuarioRequest $request, ParaOssuario $paraOssuario)
    {
        $paraOssuario->update($request->all());

        return (new ParaOssuarioResource($paraOssuario))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ParaOssuario $paraOssuario)
    {
        abort_if(Gate::denies('para_ossuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paraOssuario->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
