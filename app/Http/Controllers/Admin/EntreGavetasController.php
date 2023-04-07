<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cemiterio;
use App\Models\EntreGaveta;
use App\Models\Gavetum;
use App\Models\ObitosGaveta;
use App\Models\Ossuario;
use App\Models\Responsavel;
use App\Models\User;
use App\Models\AuditLog;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EntreGavetasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entre_gaveta_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entreGavetas = EntreGaveta::with(['responsavel', 'falecido', 'cemiterio', 'ossuario', 'gaveta', 'cemiterio_de_destino', 'ossuario_de_destino', 'gaveta_de_destino', 'assinatura'])->get();

        $responsavels = Responsavel::get();

        $obitos = ObitosGaveta::get();

        $cemiterios = Cemiterio::get();

        $ossuarios = Ossuario::get();

        $gaveta = Gavetum::get();

        $users = User::get();

        return view('admin.entreGavetas.index', compact('cemiterios', 'entreGavetas', 'gaveta', 'obitos', 'ossuarios', 'responsavels', 'users'));
    }

    public function create($id)
    {
        abort_if(Gate::denies('entre_gaveta_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavels = Responsavel::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $falecidos = ObitosGaveta::pluck('nome_do_falecido', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuarios = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gavetas = Gavetum::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cemiterio_de_destinos = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuario_de_destinos = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gaveta_de_destino = Gavetum::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $remetente = ObitosGaveta::where('id', $id)->first();

        return view('admin.entreGavetas.create', compact('id', 'remetente', 'cemiterio_de_destinos', 'cemiterios', 'falecidos', 'gaveta_de_destino', 'gavetas', 'ossuario_de_destinos', 'ossuarios', 'responsavels'));
    }

    public function store(Request $request)
    {
      // dd($request->all());

        $falecido = ObitosGaveta::where('id', $request->id)->first();
        $responsavel = Responsavel::where('id', $falecido->responsavel_id)->first();

        if ($request->tipo_de_destino === 'Interno') {

          // entre lotes criar

          $EntreGaveta = EntreGaveta::create($request->all());
          $EntreGaveta->responsavel_id = $responsavel->id;
          $EntreGaveta->responsavel_nome = $responsavel->nome;
          $EntreGaveta->falecido_id = $falecido->id;
          $EntreGaveta->falecido_nome = $falecido->nome_do_falecido;
          $EntreGaveta->save();

          // audit log criar

          $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->first();
          $ossuario = Ossuario::where('id', $request->ossuario_id)->first();
          $gaveta = Gavetum::where('id', $request->gaveta_id)->first();

          $cemiterio_destino = Cemiterio::where('id', $request->cemiterio_de_destino_id)->first();
          $ossuario_destino = Ossuario::where('id', $request->ossuario_de_destino_id)->first();
          $gaveta_destino = Gavetum::where('id', $request->gaveta_de_destino_id)->first();

          $audit = AuditLog::create([
            'ação' => 'Cadastro',
            'autor' => Auth::user()->id,
            'local' => 'Transf. entre Gavetas',
            'registro' => '#'. $EntreGaveta->id . ' - ' . $falecido->nome_do_falecido,
            'descrição' => 'ID: '. $EntreGaveta->id
            .' | Falecido: '. $falecido->nome_do_falecido
            .' | Tipo de Destino: '. $request->tipo_de_destino
            .' | Remetente: '. $cemiterio->nome . ' - ' . $ossuario->indentificacao . ' - ' . $gaveta->indentificacao
            .' | Destino: '. $cemiterio_destino->nome . ' - ' . $ossuario_destino->indentificacao . ' - ' . $gaveta_destino->indentificacao
            .' | Data de Transferencia: ' . $request->data_de_transferencia
            .' | Observações: ' . $request->observacoes,
            'host' => $request->ip(),

          ]);

          // falecido atualizar

          $falecido->cemiterio_id = $request->cemiterio_de_destino_id;
          $falecido->ossuario_id = $request->ossuario_de_destino_id;
          $falecido->gaveta_id = $request->gaveta_de_destino_id;
          $falecido->situacao = 'Ativo';
          $falecido->save();

        }

        elseif ($request->tipo_de_destino === 'Externo') {

          // entre lotes criar

          $EntreGaveta = EntreGaveta::create($request->all());
          $EntreGaveta->responsavel_id = $responsavel->id;
          $EntreGaveta->responsavel_nome = $responsavel->nome;
          $EntreGaveta->falecido_id = $falecido->id;
          $EntreGaveta->falecido_nome = $falecido->nome_do_falecido;
          $EntreGaveta->save();

          // audit log criar

          $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->first();
          $ossuario = Ossuario::where('id', $request->ossuario_id)->first();
          $gaveta = Gavetum::where('id', $request->gaveta_id)->first();

          $audit = AuditLog::create([
            'ação' => 'Cadastro',
            'autor' => Auth::user()->id,
            'local' => 'Transf. entre Gavetas',
            'registro' => '#'. $EntreGaveta->id . ' - ' . $falecido->nome_do_falecido,
            'descrição' => 'ID: '. $EntreGaveta->id
            .' | Falecido: '. $falecido->nome_do_falecido
            .' | Tipo de Destino: '. $request->tipo_de_destino
            .' | Remetente: '. $cemiterio->nome . ' - ' . $ossuario->indentificacao . ' - ' . $gaveta->indentificacao
            .' | Destino: '. $request->destino
            .' | Data de Transferencia: ' . $request->data_de_transferencia
            .' | Observações: ' . $request->observacoes,
            'host' => $request->ip(),

          ]);

          // falecido atualizar

          $falecido->situacao = 'Transferido';
          $falecido->save();

        }

        return redirect()->route('admin.obitos-gavetas.index');
    }

    public function show(EntreGaveta $EntreGaveta)
    {
        abort_if(Gate::denies('entre_gaveta_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $EntreGaveta->load('responsavel', 'falecido', 'cemiterio', 'ossuario', 'gaveta', 'cemiterio_de_destino', 'ossuario_de_destino', 'gaveta_de_destino', 'assinatura');

        return view('admin.entreGavetas.show', compact('EntreGaveta'));
    }

}
