<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRecadastramentoRequest;
use App\Http\Requests\UpdateRecadastramentoRequest;
use App\Http\Resources\Admin\RecadastramentoResource;
use App\Models\Recadastramento;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecadastramentoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('recadastramento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RecadastramentoResource(Recadastramento::with(['cemiterio', 'setor', 'quadra', 'lote', 'assinatura'])->get());
    }

    public function store(StoreRecadastramentoRequest $request)
    {
        $recadastramento = Recadastramento::create($request->all());

        foreach ($request->input('anexos', []) as $file) {
            $recadastramento->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
        }

        return (new RecadastramentoResource($recadastramento))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Recadastramento $recadastramento)
    {
        abort_if(Gate::denies('recadastramento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RecadastramentoResource($recadastramento->load(['cemiterio', 'setor', 'quadra', 'lote', 'assinatura']));
    }

    public function update(UpdateRecadastramentoRequest $request, Recadastramento $recadastramento)
    {
        $recadastramento->update($request->all());

        if (count($recadastramento->anexos) > 0) {
            foreach ($recadastramento->anexos as $media) {
                if (!in_array($media->file_name, $request->input('anexos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $recadastramento->anexos->pluck('file_name')->toArray();
        foreach ($request->input('anexos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $recadastramento->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
            }
        }

        return (new RecadastramentoResource($recadastramento))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Recadastramento $recadastramento)
    {
        abort_if(Gate::denies('recadastramento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadastramento->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
