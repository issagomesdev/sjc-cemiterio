<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompraDeLoteRequest;
use App\Http\Requests\StoreCompraDeLoteRequest;
use App\Http\Requests\UpdateCompraDeLoteRequest;
use App\Models\CompraDeLote;
use App\Models\Obito;
use App\Models\User;
use App\Models\AuditLog;
use App\Models\Responsavel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CompraDeLoteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('compra_de_lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compraDeLotes = CompraDeLote::with(['responsavel', 'assinatura'])->get();

        $obitos = Obito::get();

        $users = User::get();

        return view('admin.compraDeLotes.index', compact('compraDeLotes', 'obitos', 'users'));
    }

    public function create(Request $request, $id)
    {
        abort_if(Gate::denies('compra_de_lote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.compraDeLotes.create', compact('id'));
    }

    public function store(Request $request)
    {

        $compraDeLote = CompraDeLote::create($request->all());
        $compraDeLote->responsavel_id = $request->id;
        $compraDeLote->save();
        $responsavel = Responsavel::where('id', $compraDeLote->responsavel_id)->first();

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Compras de Lote',
          'registro' => '#'. $compraDeLote->id . ' - '. $responsavel->nome,
          'descrição' => 'ID: '. $compraDeLote->id
          .' | Responsável: '. $responsavel->nome
          .' | numero DAM: '. $compraDeLote->numero_dam
          .' | Ano DAM: '. $compraDeLote->ano_dam
          .' | Data Da Aquisicao: '. $compraDeLote->data_da_aquisicao
          .' | Observações: '. $compraDeLote->observacoes,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.compra-de-lotes.index');
    }

    public function edit(CompraDeLote $compraDeLote)
    {
        abort_if(Gate::denies('compra_de_lote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compraDeLote->load('responsavel', 'assinatura');

        return view('admin.compraDeLotes.edit', compact('compraDeLote'));
    }

    public function update(UpdateCompraDeLoteRequest $request, CompraDeLote $compraDeLote)
    {
        $compraDeLote->update($request->all());

        $responsavel = Responsavel::where('id', $compraDeLote->responsavel_id)->first();

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Compra de Lote',
          'registro' => '#'. $compraDeLote->id . ' - '. $responsavel->nome,
          'descrição' => 'ID: '. $compraDeLote->id
          .' | Responsável: '. $responsavel->nome
          .' | numero DAM: '. $compraDeLote->numero_dam
          .' | Ano DAM: '. $compraDeLote->ano_dam
          .' | Data Da Aquisicao: '. $compraDeLote->data_da_aquisicao
          .' | Observações: '. $compraDeLote->observacoes,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.compra-de-lotes.index');
    }

    public function show(CompraDeLote $compraDeLote)
    {
        abort_if(Gate::denies('compra_de_lote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compraDeLote->load('responsavel', 'assinatura');

        return view('admin.compraDeLotes.show', compact('compraDeLote'));
    }

    public function destroy(CompraDeLote $compraDeLote, Request $request)
    {
        abort_if(Gate::denies('compra_de_lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavel = Responsavel::where('id', $compraDeLote->responsavel_id)->first();

        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Compra de Lote',
          'registro' => '#'. $compraDeLote->id . ' - '. $responsavel->nome,
          'descrição' => 'ID: '. $compraDeLote->id
          .' | Responsável: '. $responsavel->nome
          .' | numero DAM: '. $compraDeLote->numero_dam
          .' | Ano DAM: '. $compraDeLote->ano_dam
          .' | Data Da Aquisicao: '. $compraDeLote->data_da_aquisicao
          .' | Observações: '. $compraDeLote->observacoes,
          'host' => $request->ip(),

        ]);

        $compraDeLote->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompraDeLoteRequest $request)
    {
        CompraDeLote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
