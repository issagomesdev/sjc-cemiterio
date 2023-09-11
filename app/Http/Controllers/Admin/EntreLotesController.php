<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntreLoteRequest;
use App\Http\Requests\StoreEntreLoteRequest;
use App\Http\Requests\UpdateEntreLoteRequest;
use App\Models\Cemiterio;
use App\Models\EntreLote;
use App\Models\Lote;
use App\Models\Obito;
use App\Models\Quadra;
use App\Models\Setore;
use App\Models\Responsavel;
use App\Models\User;
use App\Models\AuditLog;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EntreLotesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entre_lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreLotes = EntreLote::with(['Responsavel', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'setor_destino', 'quadra_destino', 'lote_destino', 'assinatura'])->get();

        $responsavel = Responsavel::get();

        $obitos = Obito::get();

        $cemiterios = Cemiterio::get();

        $setores = Setore::get();

        $quadras = Quadra::get();

        $lotes = Lote::get();

        $users = User::get();

        return view('admin.entreLotes.index', compact('cemiterios', 'entreLotes', 'lotes', 'obitos', 'quadras', 'setores', 'responsavel', 'users'));
    }

    public function create($id)
    {
        abort_if(Gate::denies('entre_lote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavel = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $falecidos = Obito::pluck('nome_do_falecido', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lotes = Lote::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterio_destinos = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setor_destinos = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadra_destinos = Quadra::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lote_destinos = Lote::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $remetente = Obito::where('id', $id)->first();

        return view('admin.entreLotes.create', compact('id', 'remetente', 'cemiterio_destinos', 'cemiterios', 'falecidos', 'lote_destinos', 'lotes', 'quadra_destinos', 'quadras', 'setor_destinos', 'setors', 'responsavel'));
    }

    public function store(StoreEntreLoteRequest $request)
    {
      // dd($request->all());
      $falecido = Obito::where('id', $request->id)->first();
      $responsavel = Responsavel::where('id', $falecido->responsavel_id)->first();

      if ($request->tipo_de_destino === 'Interno') {

        // Criar Entre lotes

        $entreLote = EntreLote::create($request->all());
        $entreLote->responsavel_id = $responsavel->id;
        $entreLote->responsavel_nome = $responsavel->nome;
        $entreLote->falecido_id = $falecido->id;
        $entreLote->falecido_nome = $falecido->nome_do_falecido;
        $entreLote->save();

        // audit log criar

        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->first();
        $setor = Setore::where('id', $request->setor_id)->first();
        $quadra = Quadra::where('id', $request->quadra_id)->first();
        $lote = Lote::where('id', $request->lote_id)->first();

        $cemiterio_destino = Cemiterio::where('id', $request->cemiterio_destino_id)->first();
        $setor_destino = Setore::where('id', $request->setor_destino_id)->first();
        $quadra_destino = Quadra::where('id', $request->quadra_destino_id)->first();
        $lote_destino = Lote::where('id', $request->lote_destino_id)->first();

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Transf. entre lotes',
          'registro' => '#'. $entreLote->id . ' - ' . $falecido->nome_do_falecido,
          'descrição' => 'ID: '. $entreLote->id
          .' | Falecido: '. $falecido->nome_do_falecido
          .' | Tipo de Destino: '. $request->tipo_de_destino
          .' | Remetente: '. $cemiterio->nome . ' - ' . $setor->indentificacao . ' - ' . $quadra->indentificacao . ' - ' . $lote->indentificacao
          .' | Destino: '. $cemiterio_destino->nome . ' - ' . $setor_destino->indentificacao . ' - ' . $quadra_destino->indentificacao . ' - ' . $lote_destino->indentificacao
          .' | Data de Transferencia: ' . $request->data_de_transferencia
          .' | Observações: ' . $request->observacoes,
          'host' => $request->ip(),

        ]);

        // Atualizar falecido

        $falecido->cemiterio_id = $request->cemiterio_destino_id;
        $falecido->setor_id = $request->setor_destino_id;
        $falecido->quadra_id = $request->quadra_destino_id;
        $falecido->lote_id = $request->lote_destino_id;
        $falecido->situacao = 'Ativo';
        $falecido->save();

      }

      elseif ($request->tipo_de_destino === 'Externo') {

        // Criar Entre lotes

        $entreLote = EntreLote::create($request->all());
        $entreLote->responsavel_id = $responsavel->id;
        $entreLote->responsavel_nome = $responsavel->nome;
        $entreLote->falecido_id = $falecido->id;
        $entreLote->falecido_nome = $falecido->nome_do_falecido;
        $entreLote->save();

        // audit log criar

        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->first();
        $setor = Setore::where('id', $request->setor_id)->first();
        $quadra = Quadra::where('id', $request->quadra_id)->first();
        $lote = Quadra::where('id', $request->lote_id)->first();

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Transf. entre lotes',
          'registro' => '#'. $entreLote->id . ' - '. $falecido->nome_do_falecido,
          'descrição' => 'ID: '. $entreLote->id
          .' | Falecido: '. $falecido->nome_do_falecido
          .' | Tipo de Destino: '. $request->tipo_de_destino
          .' | Remetente: '. $cemiterio->nome . ' - ' . $setor->indentificacao . ' - ' . $quadra->indentificacao . ' - ' . $lote->indentificacao
          .' | Destino: '. $request->destino
          .' | Data de Transferencia: ' . $request->data_de_transferencia
          .' | Observações: ' . $request->observacoes,
          'host' => $request->ip(),

        ]);

        // Atualizar falecido

        $falecido->situacao = 'Transferido';
        $falecido->save();

      }

        return redirect()->route('admin.obitos-lotes.index');
    }

    public function show(EntreLote $entreLote)
    {
        abort_if(Gate::denies('entre_lote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreLote->load('responsavel', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'setor_destino', 'quadra_destino', 'lote_destino', 'assinatura');

        return view('admin.entreLotes.show', compact('entreLote'));
    }

}
