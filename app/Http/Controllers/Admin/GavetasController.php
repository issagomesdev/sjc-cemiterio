<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGavetumRequest;
use App\Http\Requests\StoreGavetumRequest;
use App\Http\Requests\UpdateGavetumRequest;
use App\Models\Cemiterio;
use App\Models\Gavetum;
use App\Models\Ossuario;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GavetasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gavetum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gaveta = Gavetum::with(['cemiterio', 'ossuario', 'assinatura'])->get();

        $cemiterios = Cemiterio::get();

        $ossuarios = Ossuario::get();

        $users = User::get();

        return view('admin.gaveta.index', compact('cemiterios', 'gaveta', 'ossuarios', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('gavetum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuarios = Ossuario::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gaveta.create', compact('cemiterios', 'ossuarios'));
    }

    public function store(StoreGavetumRequest $request)
    {

        $gavetum = Gavetum::create($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $ossuario = Ossuario::where('id', $request->ossuario_id)->pluck('indentificacao');

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Gavetas',
          'registro' => '#'. $gavetum->id . ' - ' . $gavetum->indentificacao,
          'descrição' => 'ID: '. $gavetum->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Ossuário: '. implode($ossuario->toArray('0'))
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao
          .' | Gaveta Vazia? '. $request->gaveta_vazia,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.gaveta.index');
    }

    public function edit(Gavetum $gavetum)
    {
        abort_if(Gate::denies('gavetum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuarios = Ossuario::where('cemiterio_id', $gavetum->cemiterio_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gavetum->load('cemiterio', 'ossuario', 'assinatura');

        return view('admin.gaveta.edit', compact('cemiterios', 'gavetum', 'ossuarios'));
    }

    public function update(UpdateGavetumRequest $request, Gavetum $gavetum)
    {
        $gavetum->update($request->all());

        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $ossuario = Ossuario::where('id', $request->ossuario_id)->pluck('indentificacao');

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Gavetas',
          'registro' => '#'. $gavetum->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $gavetum->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Ossuário: '. implode($ossuario->toArray('0'))
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao
          .' | Gaveta Vazia? '. $request->gaveta_vazia,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.gaveta.index');
    }

    public function show(Gavetum $gavetum)
    {
        abort_if(Gate::denies('gavetum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gavetum->load('cemiterio', 'ossuario', 'assinatura');

        return view('admin.gaveta.show', compact('gavetum'));
    }

    public function destroy(Gavetum $gavetum, Request $request)
    {
        abort_if(Gate::denies('gavetum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio = Cemiterio::where('id', $gavetum->cemiterio_id)->pluck('nome');
        $ossuario = Ossuario::where('id', $gavetum->ossuario_id)->pluck('indentificacao');
        
        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Gavetas',
          'registro' => '#'. $gavetum->id . ' - ' . $gavetum->indentificacao,
          'descrição' => 'ID: '. $gavetum->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Ossuário: '. implode($ossuario->toArray('0'))
          .' | Indentificação: '. $gavetum->indentificacao
          .' | Descrição: '. $gavetum->descricao
          .' | Gaveta Vazia? '. $gavetum->gaveta_vazia,
          'host' => $request->ip(),

        ]);
        $gavetum->delete();

        return back();
    }

    public function massDestroy(MassDestroyGavetumRequest $request)
    {
        Gavetum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
