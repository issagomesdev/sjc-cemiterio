<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cemiterio;
use App\Models\Gavetum;
use App\Models\Lote;
use App\Models\Obito;
use App\Models\ObitosGaveta;
use App\Models\Ossuario;
use App\Models\ParaLote;
use App\Models\Quadra;
use App\Models\Setore;
use App\Models\AuditLog;
use App\Models\Responsavel;
use App\Models\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ParaLotesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('para_lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paraLotes = ParaLote::with(['responsavel', 'falecido', 'cemiterio', 'ossuario', 'gaveta', 'cemiterio_de_destino', 'setor_de_destino', 'quadra_de_destino', 'lote_de_destino', 'assinatura'])->get();

        $responsavels = Responsavel::get();

        $obitos = Obito::get();

        $cemiterios = Cemiterio::get();

        $ossuarios = Ossuario::get();

        $gaveta = Gavetum::get();

        $setores = Setore::get();

        $quadras = Quadra::get();

        $lotes = Lote::get();

        $users = User::get();

        return view('admin.paraLotes.index', compact('cemiterios', 'gaveta', 'lotes', 'obitos', 'ossuarios', 'paraLotes', 'quadras', 'setores', 'responsavels', 'users'));
    }

    public function create($id)
    {
        abort_if(Gate::denies('para_lote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavels = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $falecidos = Obito::pluck('nome_do_falecido', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuarios = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gavetas = Gavetum::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterio_de_destinos = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setor_de_destinos = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadra_de_destino = Quadra::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lote_de_destinos = Lote::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $remetente = ObitosGaveta::where('id', $id)->first();

        return view('admin.paraLotes.create', compact('id', 'remetente', 'cemiterio_de_destinos', 'cemiterios', 'falecidos', 'gavetas', 'lote_de_destinos', 'ossuarios', 'quadra_de_destino', 'responsavels', 'setor_de_destinos'));
    }

    public function store(Request $request)
    {

      $falecido = ObitosGaveta::where('id', $request->id)->first();
      $responsavel = Responsavel::where('id', $falecido->responsavel_id)->first();

      // obitos em lotes criar

      $ObitosLote = Obito::create([

        'responsavel_id' => $falecido->responsavel_id,
        'cemiterio_id' => $request->cemiterio_destino_id,
        'setor_id' => $request->setor_de_destino_id,
        'quadra_id' => $request->quadra_de_destino_id,
        'lote_id' => $request->lote_de_destino_id,
        'numero_dam' => $falecido->numero_dam,
        'ano_dam' => $falecido->ano_dam,
        'nome_do_falecido' => $falecido->nome_do_falecido,
        'data_de_nascimento' => $falecido->data_de_nascimento,
        'data_de_falecimento' => $falecido->data_de_falecimento,
        'data_de_sepultamento' => $falecido->data_de_sepultamento,
        'nome_da_mae' => $falecido->nome_da_mae,
        'nome_do_pai' => $falecido->nome_do_pai,
        'sexo' => $falecido->sexo,
        'cor_raca' => $falecido->cor_raca,
        'certidao_de_obito' => $falecido->certidao_de_obito,
        'causa_da_morte' => $falecido->causa_da_morte,
        'naturalidade' => $falecido->naturalidade,
        'estado' => $falecido->estado,
        'cidade' => $falecido->cidade,
        'bairro' => $falecido->bairro,
        'rua' => $falecido->rua,
        'numero' => $falecido->numero,
        'observacoes' => $falecido->observacoes,
        'situacao' => $falecido->situacao,
        'assinatura_id' => Auth::user()->id,

      ]);

      // para gaveta criar

      $paraLote = ParaLote::create($request->all());
      $paraLote->responsavel_id = $responsavel->id;
      $paraLote->responsavel_nome = $responsavel->nome;
      $paraLote->falecido_id = $falecido->id;
      $paraLote->falecido_nome = $falecido->nome_do_falecido;
      $paraLote->save();

      // audit log criar

      $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->first();
      $ossuario = Ossuario::where('id', $request->ossuario_id)->first();
      $gaveta = Gavetum::where('id', $request->gaveta_id)->first();

      $cemiterio_destino = Cemiterio::where('id', $request->cemiterio_de_destino_id)->first();
      $setor_destino = Setore::where('id', $request->setor_de_destino_id)->first();
      $quadra_destino = Quadra::where('id', $request->quadra_de_destino_id)->first();
      $lote_destino = Quadra::where('id', $request->lote_de_destino_id)->first();

      $audit = AuditLog::create([
        'ação' => 'Cadastro',
        'autor' => Auth::user()->id,
        'local' => 'Transf. gaveta para lote',
        'registro' => '#'. $paraLote->id . ' - ' . $falecido->nome_do_falecido,
        'descrição' => 'ID: '. $paraLote->id
        .' | Falecido: '. $falecido->nome_do_falecido
        .' | Remetente: '. $cemiterio->nome . ' - ' . $ossuario->indentificacao . ' - ' . $gaveta->indentificacao
        .' | Destino: '. $cemiterio_destino . ' - ' . $setor_destino . ' - ' . $quadra_destino . ' - ' . $lote_destino
        .' | Data de Transferencia: ' . $request->data_de_transferencia
        .' | Observações: ' . $request->observacoes,
        'host' => $request->ip(),

      ]);

      // exclui obito_lote

      $obitos_gaveta = DB::table('obitos_gaveta')->where('id', $request->id)->delete();

        return redirect()->route('admin.obitos-gavetas.index');
    }

    public function edit(ParaLote $paraLote)
    {
        abort_if(Gate::denies('para_lote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavels = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $falecidos = Obito::pluck('nome_do_falecido', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuarios = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gavetas = Gavetum::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterio_de_destinos = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setor_de_destinos = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadra_de_destino = Quadra::pluck('indentificacao', 'id');

        $lote_de_destinos = Lote::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paraLote->load('responsavel', 'falecido', 'cemiterio', 'ossuario', 'gaveta', 'cemiterio_de_destino', 'setor_de_destino', 'quadra_de_destino', 'lote_de_destino', 'assinatura');

        return view('admin.paraLotes.edit', compact('cemiterio_de_destinos', 'cemiterios', 'falecidos', 'gavetas', 'lote_de_destinos', 'ossuarios', 'paraLote', 'quadra_de_destino', 'responsavels', 'setor_de_destinos'));
    }

    public function update(Request $request, ParaLote $paraLote)
    {
        $paraLote->update($request->all());
        $paraLote->quadra_de_destino()->sync($request->input('quadra_de_destino', []));

        return redirect()->route('admin.para-lotes.index');
    }

    public function show(ParaLote $paraLote)
    {
        abort_if(Gate::denies('para_lote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paraLote->load('responsavel', 'falecido', 'cemiterio', 'ossuario', 'gaveta', 'cemiterio_de_destino', 'setor_de_destino', 'quadra_de_destino', 'lote_de_destino', 'assinatura');

        return view('admin.paraLotes.show', compact('paraLote'));
    }

    public function destroy(ParaLote $paraLote)
    {
        abort_if(Gate::denies('para_lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paraLote->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        ParaLote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
