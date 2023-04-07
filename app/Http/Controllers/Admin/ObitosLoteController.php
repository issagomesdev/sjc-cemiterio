<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Cemiterio;
use App\Models\Lote;
use App\Models\Obito;
use App\Models\Quadra;
use App\Models\Setore;
use App\Models\Responsavel;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ObitosLoteController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('obitos_lotes_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obitos = Obito::with(['responsavel', 'cemiterio', 'setor', 'quadra', 'lote', 'assinatura', 'media'])->get();

        $responsaveis = Responsavel::get();

        $cemiterios = Cemiterio::get();

        $setores = Setore::get();

        $quadras = Quadra::get();

        $lotes = Lote::get();

        $users = User::get();

        return view('admin.obitosLote.index', compact('cemiterios', 'lotes', 'obitos', 'quadras', 'setores', 'responsaveis', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('obitos_lotes_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lotes = Lote::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.obitosLote.create', compact('cemiterios', 'lotes', 'quadras', 'setors', 'responsaveis'));
    }

    public function store(Request $request)
    {

        $obito = Obito::create($request->all());

        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $request->quadra_id)->pluck('indentificacao');
        $lote = Quadra::where('id', $request->lote_id)->pluck('indentificacao');

        $audit = AuditLog::create([
            'ação' => 'Cadastro',
            'autor' => Auth::user()->id,
            'local' => 'Óbitos em Lotes',
            'registro' => '#'. $obito->id . ' - ' . $request->nome_do_falecido,
            'descrição' => 'ID: '. $obito->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Setor: '. implode($setor->toArray('0'))
            .' | Quadra: '. implode($quadra->toArray('0'))
            .' | Lote: '. implode($lote->toArray('0'))
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
            $obito->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $obito->id]);
        }

        return redirect()->route('admin.obitos-lotes.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('obitos_lotes_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obito = Obito::FindorFail($id);

        $responsaveis = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::where('cemiterio_id', $obito->cemiterio_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::where('setor_id', $obito->setor_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lotes = Lote::where('quadra_id', $obito->quadra_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $obito->load('responsavel', 'cemiterio', 'setor', 'quadra', 'lote', 'assinatura');

        return view('admin.obitosLote.edit', compact('cemiterios', 'lotes', 'obito', 'quadras', 'setors', 'responsaveis'));
    }

    public function update(Request $request, $id)
    {

        $obito = Obito::FindorFail($id);

        $obito->update($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $request->quadra_id)->pluck('indentificacao');
        $lote = Quadra::where('id', $request->lote_id)->pluck('indentificacao');

        $audit = AuditLog::create([
            'ação' => 'Edição',
            'autor' => Auth::user()->id,
            'local' => 'Óbitos em Lotes',
            'registro' => '#'. $obito->id . ' - ' . $request->nome_do_falecido,
            'descrição' => 'ID: '. $obito->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Setor: '. implode($setor->toArray('0'))
            .' | Quadra: '. implode($quadra->toArray('0'))
            .' | Lote: '. implode($lote->toArray('0'))
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

        return redirect()->route('admin.obitos-lotes.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('obitos_lotes_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obito = Obito::FindorFail($id);

        $obito->load('responsavel', 'cemiterio', 'setor', 'quadra', 'lote', 'assinatura');

        return view('admin.obitosLote.show', compact('obito'));
    }

    public function destroy(Request $request, $id)
    {
        abort_if(Gate::denies('obitos_lotes_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obito = Obito::FindorFail($id);
        $cemiterio = Cemiterio::where('id', $obito->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $obito->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $obito->quadra_id)->pluck('indentificacao');
        $lote = Quadra::where('id', $obito->lote_id)->pluck('indentificacao');

        $audit = AuditLog::create([
            'ação' => 'Exclusão',
            'autor' => Auth::user()->id,
            'local' => 'Óbitos em Lotes',
            'registro' => '#'. $obito->id . ' - ' . $obito->nome_do_falecido,
            'descrição' => 'ID: '. $obito->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Setor: '. implode($setor->toArray('0'))
            .' | Quadra: '. implode($quadra->toArray('0'))
            .' | Lote: '. implode($lote->toArray('0'))
            .' | Numero DAM: '. $obito->numero_dam
            .' | Ano DAM: '. $obito->ano_dam
            .' | Nome do Falecido: '. $obito->nome_do_falecido
            .' | Data de Nascimento: '. $obito->data_de_nascimento
            .' | Data de Falecimento: '. $obito->data_de_falecimento
            .' | Data de Sepultamento: '. $obito->data_de_sepultamento
            .' | Nome da Mãe: '. $obito->nome_da_mae
            .' | Nome do Pai: '. $obito->nome_do_pai
            .' | Sexo: '. $obito->sexo
            .' | Cor/Raça: '. $obito->cor_raca
            .' | Certidão de Obito: '. $obito->certidao_de_obito
            .' | Causa da Morte: '. $obito->causa_da_morte
            .' | Naturalidade: '. $obito->naturalidade
            .' | Estado: '. $obito->estado
            .' | Cidade: '. $obito->cidade
            .' | Bairro: '. $obito->bairro
            .' | Rua: '. $obito->rua
            .' | Numero: '. $obito->numero
            .' | Observações: '. $obito->observacoes
            .' | Gratuito? '. $obito->gratuito,
            'host' => $request->ip(),

          ]);

        $obito->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Obito::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('obitos_lotes_create') && Gate::denies('obitos_lotes_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Obito();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
