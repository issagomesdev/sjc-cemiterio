<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Cemiterio;
use App\Models\Gavetum;
use App\Models\ObitosGaveta;
use App\Models\Ossuario;
use App\Models\Responsavel;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ObitosGavetaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('obitos_gavetas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obitosGavetas = ObitosGaveta::with(['responsavel', 'cemiterio', 'ossuario', 'gaveta', 'assinatura', 'media'])->get();

        $responsaveis = Responsavel::get();

        $cemiterios = Cemiterio::get();

        $ossuarios = Ossuario::get();

        $gaveta = Gavetum::get();

        $users = User::get();

        return view('admin.obitosGaveta.index', compact('cemiterios', 'gaveta', 'obitosGavetas', 'ossuarios', 'responsaveis', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('obitos_gavetas_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuarios = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gavetas = Gavetum::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.obitosGaveta.create', compact('cemiterios', 'gavetas', 'ossuarios', 'responsaveis'));
    }

    public function store(Request $request)
    {

        $obitosGaveta = ObitosGaveta::create($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $ossuario = Ossuario::where('id', $request->ossuario_id)->pluck('indentificacao');
        $gaveta = Gavetum::where('id', $request->gaveta_id)->pluck('indentificacao');

        $audit = AuditLog::create([
            'ação' => 'Cadastro',
            'autor' => Auth::user()->id,
            'local' => 'Óbitos em Gavetas',
            'registro' => '#'. $obitosGaveta->id . ' - ' . $request->nome_do_falecido,
            'descrição' => 'ID: '. $obitosGaveta->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Ossuário: '. implode($ossuario->toArray('0'))
            .' | Gaveta: '. implode($gaveta->toArray('0'))
            .' | Numero DAM: '. $request->numero_dam
            .' | Ano DAM: '. $request->ano_dam
            .' | Nome do Falecido: '. $request->nome_do_falecido
            .' | Data de Nascimento: '. $request->data_de_nascimento
            .' | Data de Falecimento: '. $request->data_de_falecimento
            .' | Data de Sepultamento: '. $request->data_de_sepultamento
            .' | Nome da Mãe: '. $request->nome_da_mae
            .' | Nome do Pai: '. $request->nome_do_pai
            .' | Sexo: '. $request->sexo
            .' | Cor/Raça: '. $request->cor_raca
            .' | Certidão de Obito: '. $request->certidao_de_obito
            .' | Causa da Morte: '. $request->causa_da_morte
            .' | Naturalidade: '. $request->naturalidade
            .' | Estado: '. $request->estado
            .' | Cidade: '. $request->cidade
            .' | Bairro: '. $request->bairro
            .' | Rua: '. $request->rua
            .' | Numero: '. $request->numero
            .' | Observações: '. $request->observacoes
            .' | Gratuito? '. $request->gratuito,
            'host' => $request->ip(),

          ]);

        foreach ($request->input('anexos', []) as $file) {
            $obitosGaveta->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $obitosGaveta->id]);
        }

        return redirect()->route('admin.obitos-gavetas.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('obitos_gavetas_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obitosGaveta = ObitosGaveta::FindorFail($id);

        $responsaveis = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuarios = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gavetas = Gavetum::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $obitosGaveta->load('responsavel', 'cemiterio', 'ossuario', 'gaveta', 'assinatura');

        return view('admin.obitosGaveta.edit', compact('cemiterios', 'gavetas', 'obitosGaveta', 'ossuarios', 'responsaveis'));
    }

    public function update(Request $request, $id)
    {

      $obitosGaveta = ObitosGaveta::FindorFail($id);
      $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
      $ossuario = Ossuario::where('id', $request->ossuario_id)->pluck('indentificacao');
      $gaveta = Gavetum::where('id', $request->gaveta_id)->pluck('indentificacao');

      $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Óbitos em Gavetas',
          'registro' => '#'. $obitosGaveta->id . ' - ' . $request->nome_do_falecido,
          'descrição' => 'ID: '. $obitosGaveta->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Ossuário: '. implode($ossuario->toArray('0'))
          .' | Gaveta: '. implode($gaveta->toArray('0'))
          .' | Numero DAM: '. $request->numero_dam
          .' | Ano DAM: '. $request->ano_dam
          .' | Nome do Falecido: '. $request->nome_do_falecido
          .' | Data de Nascimento: '. $request->data_de_nascimento
          .' | Data de Falecimento: '. $request->data_de_falecimento
          .' | Data de Sepultamento: '. $request->data_de_sepultamento
          .' | Nome da Mãe: '. $request->nome_da_mae
          .' | Nome do Pai: '. $request->nome_do_pai
          .' | Sexo: '. $request->sexo
          .' | Cor/Raça: '. $request->cor_raca
          .' | Certidão de Obito: '. $request->certidao_de_obito
          .' | Causa da Morte: '. $request->causa_da_morte
          .' | Naturalidade: '. $request->naturalidade
          .' | Estado: '. $request->estado
          .' | Cidade: '. $request->cidade
          .' | Bairro: '. $request->bairro
          .' | Rua: '. $request->rua
          .' | Numero: '. $request->numero
          .' | Observações: '. $request->observacoes
          .' | Gratuito? '. $request->gratuito,
          'host' => $request->ip(),

        ]);

        $obitosGaveta->update($request->all());

        if (count($obitosGaveta->anexos) > 0) {
            foreach ($obitosGaveta->anexos as $media) {
                if (!in_array($media->file_name, $request->input('anexos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $obitosGaveta->anexos->pluck('file_name')->toArray();
        foreach ($request->input('anexos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $obitosGaveta->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
            }
        }

        return redirect()->route('admin.obitos-gavetas.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('obitos_gavetas_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obitosGaveta = ObitosGaveta::FindorFail($id);

        $obitosGaveta->load('responsavel', 'cemiterio', 'ossuario', 'gaveta', 'assinatura');

        return view('admin.obitosGaveta.show', compact('obitosGaveta'));
    }

    public function destroy(Request $request, $id)
    {
        abort_if(Gate::denies('obitos_gavetas_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obitosGaveta = ObitosGaveta::FindorFail($id);
        $cemiterio = Cemiterio::where('id', $obitosGaveta->cemiterio_id)->pluck('nome');
        $ossuario = Ossuario::where('id', $obitosGaveta->ossuario_id)->pluck('indentificacao');
        $gaveta = Gavetum::where('id', $obitosGaveta->gaveta_id)->pluck('indentificacao');

        $audit = AuditLog::create([
            'ação' => 'Exclusão',
            'autor' => Auth::user()->id,
            'local' => 'Óbitos em Gavetas',
            'registro' => '#'. $obitosGaveta->id . ' - ' . $obitosGaveta->nome_do_falecido,
            'descrição' => 'ID: '. $obitosGaveta->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Ossuário: '. implode($ossuario->toArray('0'))
            .' | Gaveta: '. implode($gaveta->toArray('0'))
            .' | Numero DAM: '. $obitosGaveta->numero_dam
            .' | Ano DAM: '. $obitosGaveta->ano_dam
            .' | Nome do Falecido: '. $obitosGaveta->nome_do_falecido
            .' | Data de Nascimento: '. $obitosGaveta->data_de_nascimento
            .' | Data de Falecimento: '. $obitosGaveta->data_de_falecimento
            .' | Data de Sepultamento: '. $obitosGaveta->data_de_sepultamento
            .' | Nome da Mãe: '. $obitosGaveta->nome_da_mae
            .' | Nome do Pai: '. $obitosGaveta->nome_do_pai
            .' | Sexo: '. $obitosGaveta->sexo
            .' | Cor/Raça: '. $obitosGaveta->cor_raca
            .' | Certidão de Obito: '. $obitosGaveta->certidao_de_obito
            .' | Causa da Morte: '. $obitosGaveta->causa_da_morte
            .' | Naturalidade: '. $obitosGaveta->naturalidade
            .' | Estado: '. $obitosGaveta->estado
            .' | Cidade: '. $obitosGaveta->cidade
            .' | Bairro: '. $obitosGaveta->bairro
            .' | Rua: '. $obitosGaveta->rua
            .' | Numero: '. $obitosGaveta->numero
            .' | Observações: '. $obitosGaveta->observacoes
            .' | Gratuito? '. $obitosGaveta->gratuito,
            'host' => $request->ip(),

          ]);

        $obitosGaveta->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        ObitosGaveta::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('obitos_gavetas_create') && Gate::denies('obitos_gavetas_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new obitosGaveta();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
