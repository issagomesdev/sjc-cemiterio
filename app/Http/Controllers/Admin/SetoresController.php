<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySetoreRequest;
use App\Http\Requests\StoreSetoreRequest;
use App\Http\Requests\UpdateSetoreRequest;
use App\Models\Cemiterio;
use App\Models\Setore;
use App\Models\User;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetoresController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setores = Setore::with(['cemiterio', 'assinatura'])->get();

        $cemiterios = Cemiterio::get();

        $users = User::get();

        return view('admin.setores.index', compact('cemiterios', 'setores', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('setore_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.setores.create', compact('cemiterios'));
    }

    public function store(StoreSetoreRequest $request)
    {

        $setore = Setore::create($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        
        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Setores',
          'registro' => '#'. $setore->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $setore->id
          .' | Identificação: '. $request->indentificacao
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Descrição: ' . $request->descricao,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.setores.index');
    }

    public function edit(Setore $setore)
    {
        abort_if(Gate::denies('setore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setore->load('cemiterio', 'assinatura');

        return view('admin.setores.edit', compact('cemiterios', 'setore'));
    }

    public function update(UpdateSetoreRequest $request, Setore $setore)
    {
        $setore->update($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');

        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Setores',
          'registro' => '#'. $setore->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $setore->id
          .' | Identificação: '. $request->indentificacao
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Descrição: ' . $request->descricao,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.setores.index');
    }

    public function show(Setore $setore)
    {
        abort_if(Gate::denies('setore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setore->load('cemiterio', 'assinatura');

        return view('admin.setores.show', compact('setore'));
    }

    public function destroy(Setore $setore, Request $request)
    {
        abort_if(Gate::denies('setore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio = Cemiterio::where('id', $setore->cemiterio_id)->pluck('nome');

        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Setores',
          'registro' => '#'. $setore->id . ' - ' . $setore->indentificacao,
          'descrição' => 'ID: '. $setore->id
          .' | Identificação: '. $setore->indentificacao
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Descrição: ' . $setore->descricao,
          'host' => $request->ip(),

        ]);

        $setore->delete();

        return back();
    }

    public function massDestroy(MassDestroySetoreRequest $request)
    {
        Setore::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
