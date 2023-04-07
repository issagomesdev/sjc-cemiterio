<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoteRequest;
use App\Http\Requests\StoreLoteRequest;
use App\Http\Requests\UpdateLoteRequest;
use App\Models\Cemiterio;
use App\Models\Lote;
use App\Models\Quadra;
use App\Models\Setore;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LotesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lotes = Lote::with(['cemiterio', 'setor', 'quadra', 'assinatura'])->get();

        $cemiterios = Cemiterio::get();

        $setores = Setore::get();

        $quadras = Quadra::get();

        $users = User::get();

        return view('admin.lotes.index', compact('cemiterios', 'lotes', 'quadras', 'setores', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('lote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lotes.create', compact('cemiterios', 'quadras', 'setors'));
    }

    public function store(StoreLoteRequest $request)
    {

        $lote = Lote::create($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $request->quadra_id)->pluck('indentificacao');

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Lotes',
          'registro' => '#'. $lote->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $lote->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Setor: '. implode($setor->toArray('0'))
          .' | Quadra: '. implode($quadra->toArray('0'))
          .' | Tipo de Lote: '. $request->tipo_de_lote
          .' | Comprimento: '. $request->comprimento
          .' | Altura: '. $request->altura
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao
          .' | Lote Vazio? '. $request->lote_vazio
          .' | Reservado? '. $request->reservado,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.lotes.index');
    }

    public function edit(Lote $lote)
    {
        abort_if(Gate::denies('lote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::where('cemiterio_id', $lote->cemiterio_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadras = Quadra::where('setor_id', $lote->setor_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lote->load('cemiterio', 'setor', 'quadra', 'assinatura');

        return view('admin.lotes.edit', compact('cemiterios', 'lote', 'quadras', 'setors'));
    }

    public function update(UpdateLoteRequest $request, Lote $lote)
    {
        $lote->update($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $request->quadra_id)->pluck('indentificacao');

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Lotes',
          'registro' => '#'. $lote->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $lote->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Setor: '. implode($setor->toArray('0'))
          .' | Quadra: '. implode($quadra->toArray('0'))
          .' | Tipo de Lote: '. $request->tipo_de_lote
          .' | Comprimento: '. $request->comprimento
          .' | Altura: '. $request->altura
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao
          .' | Lote Vazio? '. $request->lote_vazio
          .' | Reservado? '. $request->reservado,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.lotes.index');
    }

    public function show(Lote $lote)
    {
        abort_if(Gate::denies('lote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lote->load('cemiterio', 'setor', 'quadra', 'assinatura');

        return view('admin.lotes.show', compact('lote'));
    }

    public function destroy(Lote $lote, Request $request)
    {
        abort_if(Gate::denies('lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $cemiterio = Cemiterio::where('id', $lote->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $lote->setor_id)->pluck('indentificacao');
        $quadra = Quadra::where('id', $lote->quadra_id)->pluck('indentificacao');

        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Lotes',
          'registro' => '#'. $lote->id . ' - ' . $lote->indentificacao,
          'descrição' => 'ID: '. $lote->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Setor: '. implode($setor->toArray('0'))
          .' | Quadra: '. implode($quadra->toArray('0'))
          .' | Tipo de Lote: '. $lote->tipo_de_lote
          .' | Comprimento: '. $lote->comprimento
          .' | Altura: '. $lote->altura
          .' | Indentificação: '. $lote->indentificacao
          .' | Descrição: '. $lote->descricao
          .' | Lote Vazio? '. $lote->lote_vazio
          .' | Reservado? '. $lote->reservado,
          'host' => $request->ip(),

        ]);

        $lote->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoteRequest $request)
    {
        Lote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
