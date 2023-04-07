<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCemiterioRequest;
use App\Http\Requests\StoreCemiterioRequest;
use App\Http\Requests\UpdateCemiterioRequest;
use App\Models\Cemiterio;
use App\Models\User;
use App\Models\AuditLog;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CemiteriosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cemiterio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::with(['assinatura'])->get();

        return view('admin.cemiterios.index', compact('cemiterios'));
    }

    public function create()
    {
        abort_if(Gate::denies('cemiterio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cemiterios.create');
    }

    public function store(StoreCemiterioRequest $request)
    {

        $cemiterio = Cemiterio::create($request->all());
        if ($request->input('foto_do_cemiterio')) {
            $cemiterio->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_do_cemiterio'))))->toMediaCollection('foto_do_cemiterio');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $cemiterio->id]);
        }

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Cemitérios',
          'registro' => '#'. $cemiterio->id . ' - '. $cemiterio->nome,
          'descrição' => 'ID: '. $cemiterio->id
          .' | Nome: '. $request->nome
          .' | Estado: '. $request->estado
          .' | Cidade: ' . $request->cidade
          .' | Bairro: ' . $request->bairro
          .' | Rua: '. $request->rua
          .' | Numero: '. $request->numero
          .' | Complemento: '. $request->complemento
          .' | E-mail: '. $request->email
          .' | Numero De Contato: '. $request->numero_de_contato
          .' | Numero De Contato 2: '. $request->numero_de_contato_2
          .' | Observações: '. $request->observacoes,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.cemiterios.index');
    }

    public function edit(Cemiterio $cemiterio)
    {
        abort_if(Gate::denies('cemiterio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio->load('assinatura');

        return view('admin.cemiterios.edit', compact('cemiterio'));
    }

    public function update(UpdateCemiterioRequest $request, Cemiterio $cemiterio)
    {
        $cemiterio->update($request->all());
        if ($request->input('foto_do_cemiterio', false)) {
            if (!$cemiterio->foto_do_cemiterio || $request->input('foto_do_cemiterio') !== $cemiterio->foto_do_cemiterio->file_name) {
                if ($cemiterio->foto_do_cemiterio) {
                    $cemiterio->foto_do_cemiterio->delete();
                }
                $cemiterio->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_do_cemiterio'))))->toMediaCollection('foto_do_cemiterio');
            }
        } elseif ($cemiterio->foto_do_cemiterio) {
            $cemiterio->foto_do_cemiterio->delete();
        }

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Cemitérios',
          'registro' => '#'. $cemiterio->id . ' - '. $cemiterio->nome,
          'descrição' => 'ID: '. $cemiterio->id
          .' | Nome: '. $request->nome
          .' | Estado: '. $request->estado
          .' | Cidade: ' . $request->cidade
          .' | Bairro: ' . $request->bairro
          .' | Rua: '. $request->rua
          .' | Numero: '. $request->numero
          .' | Complemento: '. $request->complemento
          .' | E-mail: '. $request->email
          .' | Numero De Contato: '. $request->numero_de_contato
          .' | Numero De Contato 2: '. $request->numero_de_contato_2
          .' | Observações: '. $request->observacoes,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.cemiterios.index');
    }

    public function show(Cemiterio $cemiterio)
    {
        abort_if(Gate::denies('cemiterio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio->load('assinatura');

        return view('admin.cemiterios.show', compact('cemiterio'));
    }

    public function destroy(Cemiterio $cemiterio, Request $request)
    {
        abort_if(Gate::denies('cemiterio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Cemitérios',
          'registro' => '#'. $cemiterio->id . ' - '. $cemiterio->nome,
          'descrição' => 'ID: '. $cemiterio->id
          .' | Nome: '. $cemiterio->nome
          .' | Estado: '. $cemiterio->estado
          .' | Cidade: ' . $cemiterio->cidade
          .' | Bairro: ' . $cemiterio->bairro
          .' | Rua: '. $cemiterio->rua
          .' | Numero: '. $cemiterio->numero
          .' | Complemento: '. $cemiterio->complemento
          .' | E-mail: '. $cemiterio->email
          .' | Numero De Contato: '. $cemiterio->numero_de_contato
          .' | Numero De Contato 2: '. $cemiterio->numero_de_contato_2
          .' | Observações: '. $cemiterio->observacoes,
          'host' => $request->ip(),

        ]);

        $cemiterio->delete();

        return back();
    }

    public function massDestroy(MassDestroyCemiterioRequest $request)
    {
        Cemiterio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cemiterio_create') && Gate::denies('cemiterio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Cemiterio();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
