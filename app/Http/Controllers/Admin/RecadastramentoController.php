<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRecadastramentoRequest;
use App\Http\Requests\StoreRecadastramentoRequest;
use App\Http\Requests\UpdateRecadastramentoRequest;
use App\Models\Cemiterio;
use App\Models\Lote;
use App\Models\Quadra;
use App\Models\Recadastramento;
use App\Models\Setore;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RecadastramentoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('recadastramento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadastramentos = Recadastramento::with(['cemiterio', 'setor', 'quadra', 'lote', 'assinatura', 'media'])->get();

        $cemiterios = Cemiterio::get();

        $setores = Setore::get();

        $quadras = Quadra::get();

        $lotes = Lote::get();

        $users = User::get();

        return view('admin.recadastramentos.index', compact('cemiterios', 'lotes', 'quadras', 'recadastramentos', 'setores', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('recadastramento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lotes = Lote::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.recadastramentos.create', compact('cemiterios', 'lotes', 'quadras', 'setors'));
    }

    public function store(StoreRecadastramentoRequest $request)
    {
       // dd($request->all());
        $recadastramento = Recadastramento::create($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $request->quadra_id)->pluck('indentificacao');
        $lote = Quadra::where('id', $request->lote_id)->pluck('indentificacao');
        $audit = AuditLog::create([
            'ação' => 'Cadastro',
            'autor' => Auth::user()->id,
            'local' => 'Recadastramentos',
            'registro' => '#'. $recadastramento->id . ' - ' . $request->nome_do_falecido,
            'descrição' => 'ID: '. $recadastramento->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Setor: '. implode($setor->toArray('0'))
            .' | Quadra: '. implode($quadra->toArray('0'))
            .' | Lote: '. implode($lote->toArray('0'))
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
            .' | Observações: '. $request->observacoes,
            'host' => $request->ip(),

          ]);

        foreach ($request->input('anexos', []) as $file) {
            $recadastramento->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('anexos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $recadastramento->id]);
        }

        return redirect()->route('admin.recadastramentos.index');
    }

    public function edit(Recadastramento $recadastramento)
    {
        abort_if(Gate::denies('recadastramento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::where('cemiterio_id', $recadastramento->cemiterio_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::where('setor_id', $recadastramento->setor_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lotes = Lote::where('quadra_id', $recadastramento->quadra_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $recadastramento->load('cemiterio', 'setor', 'quadra', 'lote', 'assinatura');

        return view('admin.recadastramentos.edit', compact('cemiterios', 'lotes', 'quadras', 'recadastramento', 'setors'));
    }

    public function update(UpdateRecadastramentoRequest $request, Recadastramento $recadastramento)
    {
        $recadastramento->update($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $request->quadra_id)->pluck('indentificacao');
        $lote = Quadra::where('id', $request->lote_id)->pluck('indentificacao');
        $audit = AuditLog::create([
            'ação' => 'Edição',
            'autor' => Auth::user()->id,
            'local' => 'Recadastramentos',
            'registro' => '#'. $recadastramento->id . ' - ' . $request->nome_do_falecido,
            'descrição' => 'ID: '. $recadastramento->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Setor: '. implode($setor->toArray('0'))
            .' | Quadra: '. implode($quadra->toArray('0'))
            .' | Lote: '. implode($lote->toArray('0'))
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
            .' | Observações: '. $request->observacoes,
            'host' => $request->ip(),

          ]);

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

        return redirect()->route('admin.recadastramentos.index');
    }

    public function show(Recadastramento $recadastramento)
    {
        abort_if(Gate::denies('recadastramento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadastramento->load('cemiterio', 'setor', 'quadra', 'lote', 'assinatura');

        return view('admin.recadastramentos.show', compact('recadastramento'));
    }

    public function destroy(Recadastramento $recadastramento, Request $request)
    {
        abort_if(Gate::denies('recadastramento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio = Cemiterio::where('id', $recadastramento->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $recadastramento->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $recadastramento->quadra_id)->pluck('indentificacao');
        $lote = Quadra::where('id', $recadastramento->lote_id)->pluck('indentificacao');
        $audit = AuditLog::create([
            'ação' => 'Exclusão',
            'autor' => Auth::user()->id,
            'local' => 'Recadastramentos',
            'registro' => '#'. $recadastramento->id . ' - ' . $recadastramento->nome_do_falecido,
            'descrição' => 'ID: '. $recadastramento->id
            .' | Cemitério: '. implode($cemiterio->toArray('0'))
            .' | Setor: '. implode($setor->toArray('0'))
            .' | Quadra: '. implode($quadra->toArray('0'))
            .' | Lote: '. implode($lote->toArray('0'))
            .' | Nome do Falecido: '. $recadastramento->nome_do_falecido
            .' | Data de Nascimento: '. $recadastramento->data_de_nascimento
            .' | Data de Falecimento: '. $recadastramento->data_de_falecimento
            .' | Data de Sepultamento: '. $recadastramento->data_de_sepultamento
            .' | Nome da Mãe: '. $recadastramento->nome_da_mae
            .' | Nome do Pai: '. $recadastramento->nome_do_pai
            .' | Sexo: '. $recadastramento->sexo
            .' | Cor/Raça: '. $recadastramento->cor_raca
            .' | Certidão de Obito: '. $recadastramento->certidao_de_obito
            .' | Causa da Morte: '. $recadastramento->causa_da_morte
            .' | Naturalidade: '. $recadastramento->naturalidade
            .' | Estado: '. $recadastramento->estado
            .' | Cidade: '. $recadastramento->cidade
            .' | Bairro: '. $recadastramento->bairro
            .' | Rua: '. $recadastramento->rua
            .' | Numero: '. $recadastramento->numero
            .' | Observações: '. $recadastramento->observacoes,
            'host' => $request->ip(),

          ]);

        $recadastramento->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecadastramentoRequest $request)
    {
        Recadastramento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('recadastramento_create') && Gate::denies('recadastramento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Recadastramento();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
