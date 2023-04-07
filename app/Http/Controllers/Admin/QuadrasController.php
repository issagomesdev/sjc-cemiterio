<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuadraRequest;
use App\Http\Requests\StoreQuadraRequest;
use App\Http\Requests\UpdateQuadraRequest;
use App\Models\Cemiterio;
use App\Models\Quadra;
use App\Models\Setore;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuadrasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quadra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quadras = Quadra::with(['cemiterio', 'setor', 'assinatura'])->get();

        $cemiterios = Cemiterio::get();

        $users = User::get();

        return view('admin.quadras.index', compact('cemiterios', 'quadras', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('quadra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.quadras.create', compact('cemiterios', 'setors'));
    }

    public function store(StoreQuadraRequest $request)
    {
      // dd($request->all());

        $quadra = Quadra::create($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Quadras',
          'registro' => '#'. $quadra->id .  ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $quadra->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Setor: '. implode($setor->toArray('0'))
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.quadras.index');
    }

    public function edit(Quadra $quadra)
    {
        abort_if(Gate::denies('quadra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setors = Setore::where('cemiterio_id', $quadra->cemiterio_id)->pluck('indentificacao', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quadra->load('cemiterio', 'setor', 'assinatura');

        return view('admin.quadras.edit', compact('cemiterios', 'quadra', 'setors'));
    }

    public function update(UpdateQuadraRequest $request, Quadra $quadra)
    {
        $quadra->update($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $request->setor_id)->pluck('indentificacao');

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Quadras',
          'registro' => '#'. $quadra->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $quadra->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Setor: '. implode($setor->toArray('0'))
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.quadras.index');
    }

    public function show(Quadra $quadra)
    {
        abort_if(Gate::denies('quadra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quadra->load('cemiterio', 'setor', 'assinatura');

        return view('admin.quadras.show', compact('quadra'));
    }

    public function destroy(Quadra $quadra, Request $request)
    {
        abort_if(Gate::denies('quadra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio = Cemiterio::where('id', $quadra->cemiterio_id)->pluck('nome');
        $setor = Setore::where('id', $quadra->setor_id)->pluck('indentificacao');
        
        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Quadras',
          'registro' => '#'. $quadra->id . ' - ' . $quadra->indentificacao,
          'descrição' => 'ID: '. $quadra->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Setor: '. implode($setor->toArray('0'))
          .' | Indentificação: '. $quadra->indentificacao
          .' | Descrição: '. $quadra->descricao,
          'host' => $request->ip(),

        ]);

        $quadra->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuadraRequest $request)
    {
        Quadra::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
