<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreObitoRequest;
use App\Http\Requests\UpdateObitoRequest;
use App\Http\Resources\Admin\ObitoResource;
use App\Models\Obito;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ObitosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('obito_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ObitoResource(Obito::with(['solicitante', 'cemiterio', 'setor', 'quadra', 'lote', 'assinatura'])->get());
    }

    public function store(StoreObitoRequest $request)
    {
        $obito = Obito::create($request->all());

        foreach ($request->input('anexos', []) as $file) {
            $obito->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
        }

        return (new ObitoResource($obito))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Obito $obito)
    {
        abort_if(Gate::denies('obito_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ObitoResource($obito->load(['solicitante', 'cemiterio', 'setor', 'quadra', 'lote', 'assinatura']));
    }

    public function update(UpdateObitoRequest $request, Obito $obito)
    {
        $obito->update($request->all());

        if (count($obito->anexos) > 0) {
            foreach ($obito->anexos as $media) {
                if (!in_array($media->file_name, $request->input('anexos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $obito->anexos->pluck('file_name')->toArray();
        foreach ($request->input('anexos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $obito->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
            }
        }

        return (new ObitoResource($obito))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Obito $obito)
    {
        abort_if(Gate::denies('obito_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obito->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
