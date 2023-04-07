<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cemiterio;
use App\Models\Gavetum;
use App\Models\Lote;
use App\Models\Obito;
use App\Models\ObitosGaveta;
use App\Models\Ossuario;
use App\Models\ParaGaveta;
use App\Models\Quadra;
use App\Models\Setore;
use App\Models\Responsavel;
use App\Models\User;
use App\Models\AuditLog;
use Gate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ParaGavetasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('para_gaveta_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paraGavetas = ParaGaveta::with(['responsavel', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'ossuario_destino', 'gaveta_destino', 'assinatura'])->get();

        $responsaveis = Responsavel::get();

        $obitos = Obito::get();

        $cemiterios = Cemiterio::get();

        $setores = Setore::get();

        $quadras = Quadra::get();

        $lotes = Lote::get();

        $ossuarios = Ossuario::get();

        $gaveta = Gavetum::get();

        $users = User::get();

        return view('admin.paraGavetas.index', compact('cemiterios', 'gaveta', 'lotes', 'obitos', 'ossuarios', 'paraGavetas', 'quadras', 'setores', 'responsaveis', 'users'));
    }

    public function create($id)
    {
        abort_if(Gate::denies('para_gaveta_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $falecidos = Obito::pluck('nome_do_falecido', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lotes = Lote::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterio_destinos = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuario_destinos = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gaveta_destinos = Gavetum::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $remetente = Obito::where('id', $id)->first();

        return view('admin.paraGavetas.create', compact('id', 'remetente', 'cemiterio_destinos', 'cemiterios', 'falecidos', 'gaveta_destinos', 'lotes', 'ossuario_destinos', 'quadras', 'setors', 'responsaveis'));
    }

    public function store(Request $request)
    {
      // dd($request->all());

      $falecido = Obito::where('id', $request->id)->first();
      $responsavel = Responsavel::where('id', $falecido->responsavel_id)->first();

      // obitos em gavetas criar

      $ObitosGaveta = ObitosGaveta::create([

        'responsavel_id' => $falecido->responsavel_id,
        'cemiterio_id' => $request->cemiterio_destino_id,
        'ossuario_id' => $request->ossuario_destino_id,
        'gaveta_id' => $request->gaveta_destino_id,
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

      $paraGavetas = ParaGaveta::create($request->all());
      $paraGavetas->responsavel_id = $responsavel->id;
      $paraGavetas->responsavel_nome = $responsavel->nome;
      $paraGavetas->falecido_id = $falecido->id;
      $paraGavetas->falecido_nome = $falecido->nome_do_falecido;
      $paraGavetas->save();

      // audit log criar

      $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->first();
      $setor = Setore::where('id', $request->setor_id)->first();
      $quadra = Quadra::where('id', $request->quadra_id)->first();
      $lote = Quadra::where('id', $request->lote_id)->first();

      $cemiterio_destino = Cemiterio::where('id', $request->cemiterio_destino_id)->pluck('nome');
      $ossuario_destino = Ossuario::where('id', $request->ossuario_destino_id)->pluck('indentificacao');
      $gaveta_destino = Gavetum::where('id', $request->gaveta_destino_id)->pluck('indentificacao');

      $audit = AuditLog::create([
        'ação' => 'Cadastro',
        'autor' => Auth::user()->id,
        'local' => 'Transf. lote para gaveta',
        'registro' => '#'. $paraGavetas->id . ' - ' . $falecido->nome_do_falecido,
        'descrição' => 'ID: '. $paraGavetas->id
        .' | Falecido: '. $falecido->nome_do_falecido
        .' | Remetente: '. $cemiterio->nome . ' - ' . $setor->indentificacao . ' - ' . $quadra->indentificacao . ' - ' . $lote->indentificacao
        .' | Destino: '. $cemiterio_destino . ' - ' . $ossuario_destino . ' - ' . $gaveta_destino
        .' | Data de Transferencia: ' . $request->data_de_transferencia
        .' | Observações: ' . $request->observacoes,
        'host' => $request->ip(),

      ]);

      // exclui obito_lote

      $obito_lote = DB::table('obitos')->where('id', $request->id)->delete();

        return redirect()->route('admin.obitos-lotes.index');
    }


    public function show(ParaGaveta $paraGaveta)
    {
        abort_if(Gate::denies('para_gaveta_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paraGaveta->load('responsavel', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'ossuario_destino', 'gaveta_destino', 'assinatura');

        return view('admin.paraGavetas.show', compact('paraGaveta'));
    }

}
