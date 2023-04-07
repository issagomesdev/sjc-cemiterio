<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOssuarioRequest;
use App\Http\Requests\StoreOssuarioRequest;
use App\Http\Requests\UpdateOssuarioRequest;
use App\Models\Cemiterio;
use App\Models\Ossuario;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OssuariosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ossuario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ossuarios = Ossuario::with(['cemiterio', 'assinatura'])->get();

        $cemiterios = Cemiterio::get();

        $users = User::get();

        return view('admin.ossuarios.index', compact('cemiterios', 'ossuarios', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('ossuario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ossuarios.create', compact('cemiterios'));
    }

    public function store(StoreOssuarioRequest $request)
    {

        $ossuario = Ossuario::create($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');

        $audit = AuditLog::create([
          'ação' => 'Cadastro',
          'autor' => Auth::user()->id,
          'local' => 'Ossuários',
          'registro' => '#'. $ossuario->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $ossuario->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.ossuarios.index');
    }

    public function edit(Ossuario $ossuario)
    {
        abort_if(Gate::denies('ossuario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ossuario->load('cemiterio', 'assinatura');

        return view('admin.ossuarios.edit', compact('cemiterios', 'ossuario'));
    }

    public function update(UpdateOssuarioRequest $request, Ossuario $ossuario)
    {
        $ossuario->update($request->all());
        $cemiterio = Cemiterio::where('id', $request->cemiterio_id)->pluck('nome');
        
        $audit = AuditLog::create([
          'ação' => 'Edição',
          'autor' => Auth::user()->id,
          'local' => 'Ossuários',
          'registro' => '#'. $ossuario->id . ' - ' . $request->indentificacao,
          'descrição' => 'ID: '. $ossuario->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Indentificação: '. $request->indentificacao
          .' | Descrição: '. $request->descricao,
          'host' => $request->ip(),

        ]);

        return redirect()->route('admin.ossuarios.index');
    }

    public function show(Ossuario $ossuario)
    {
        abort_if(Gate::denies('ossuario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ossuario->load('cemiterio', 'assinatura');

        return view('admin.ossuarios.show', compact('ossuario'));
    }

    public function destroy(Ossuario $ossuario, Request $request)
    {
        abort_if(Gate::denies('ossuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterio = Cemiterio::where('id', $ossuario->cemiterio_id)->pluck('nome');

        $audit = AuditLog::create([
          'ação' => 'Exclusão',
          'autor' => Auth::user()->id,
          'local' => 'Ossuários',
          'registro' => '#'. $ossuario->id . ' - ' . $ossuario->indentificacao,
          'descrição' => 'ID: '. $ossuario->id
          .' | Cemitério: '. implode($cemiterio->toArray('0'))
          .' | Indentificação: '. $ossuario->indentificacao
          .' | Descrição: '. $ossuario->descricao,
          'host' => $request->ip(),

        ]);

        $ossuario->delete();

        return back();
    }

    public function massDestroy(MassDestroyOssuarioRequest $request)
    {
        Ossuario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
