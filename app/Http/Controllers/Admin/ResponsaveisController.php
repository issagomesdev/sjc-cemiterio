<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Responsavel;
use App\Models\User;
use Gate;
use App\Models\AuditLog;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponsaveisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('responsavel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavel::with(['assinatura'])->get();

        $users = User::get();

        return view('admin.responsaveis.index', compact('responsaveis', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('responsavel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.responsaveis.create');
    }

    public function store(Request $request)
    {

        $responsaveis = Responsavel::create($request->all());

        $audit = AuditLog::create([
            'ação' => 'Cadastro',
            'autor' => Auth::user()->id,
            'local' => 'Responsáveis',
            'registro' => '#'. $responsaveis->id . ' - ' . $request->nome,
            'descrição' => 'ID: '. $responsaveis->id
            .' | Nome: '. $request->nome
            .' | Sexo: '. $request->sexo
            .' | Parentesco: '. $request->parentesco
            .' | Estado: '. $request->estado
            .' | Cidade: '. $request->cidade
            .' | Bairro: '. $request->bairro
            .' | Rua: '. $request->rua
            .' | Numero: '. $request->numero
            .' | Complemento: '. $request->complemento
            .' | E-mail: '. $request->email
            .' | Numero de Contato: '. $request->numero_de_contato
            .' | Numero de Contato(2): '. $request->numero_de_contato_2
            .' | Observações: '. $request->observacoes,
            'host' => $request->ip(),

          ]);

        return redirect()->route('admin.responsaveis.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('responsavel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavel::FindorFail($id)->load('assinatura');

        return view('admin.responsaveis.edit', compact('responsaveis'));
    }

    public function update(Request $request, Responsavel $responsaveis)
    {
        $responsaveis->update($request->all());

        $audit = AuditLog::create([
            'ação' => 'Edição',
            'autor' => Auth::user()->id,
            'local' => 'Responsáveis',
            'registro' => '#'. $responsaveis->id . ' - ' . $request->nome,
            'descrição' => 'ID: '. $responsaveis->id
            .' | Nome: '. $request->nome
            .' | Sexo: '. $request->sexo
            .' | Parentesco: '. $request->parentesco
            .' | Estado: '. $request->estado
            .' | Cidade: '. $request->cidade
            .' | Bairro: '. $request->bairro
            .' | Rua: '. $request->rua
            .' | Numero: '. $request->numero
            .' | Complemento: '. $request->complemento
            .' | E-mail: '. $request->email
            .' | Numero de Contato: '. $request->numero_de_contato
            .' | Numero de Contato(2): '. $request->numero_de_contato_2
            .' | Observações: '. $request->observacoes,
            'host' => $request->ip(),

          ]);

        return redirect()->route('admin.responsaveis.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('responsavel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavel::FindorFail($id)->load('assinatura');

        return view('admin.responsaveis.show', compact('responsaveis'));
    }

    public function destroy($id, Request $request)
    {
        abort_if(Gate::denies('responsavel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavel::FindorFail($id);

        $audit = AuditLog::create([
            'ação' => 'Exclusão',
            'autor' => Auth::user()->id,
            'local' => 'Responsáveis',
            'registro' => '#'. $responsaveis->id . ' - ' . $responsaveis->nome,
            'descrição' => 'ID: '. $responsaveis->id
            .' | Nome: '. $responsaveis->nome
            .' | Sexo: '. $responsaveis->sexo
            .' | Parentesco: '. $responsaveis->parentesco
            .' | Estado: '. $responsaveis->estado
            .' | Cidade: '. $responsaveis->cidade
            .' | Bairro: '. $responsaveis->bairro
            .' | Rua: '. $responsaveis->rua
            .' | Numero: '. $responsaveis->numero
            .' | Complemento: '. $responsaveis->complemento
            .' | E-mail: '. $responsaveis->email
            .' | Numero de Contato: '. $responsaveis->numero_de_contato
            .' | Numero de Contato(2): '. $responsaveis->numero_de_contato_2
            .' | Observações: '. $responsaveis->observacoes,
            'host' => $request->ip(),

          ]);

          $responsaveis->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Responsavel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
