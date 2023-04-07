<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Cemiterio;
use App\Models\Setore;
use App\Models\Quadra;
use App\Models\Lote;
use App\Models\Ossuario;
use App\Models\Gavetum;
use App\Models\Responsavel;
use App\Models\Obito;
use App\Models\ObitosGaveta;
use App\Models\CompraDeLote;
use App\Models\EntreLote;
use App\Models\EntreGaveta;
use App\Models\ParaLote;
use App\Models\ParaGaveta;
use Gate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RelatoriosController extends Controller
{
    public function users()
    {
      abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $users = User::get();

         $roles = Role::get();

      return view('admin.relatorios.users', compact('roles', 'users'));
    }

    public function cemiterios()
    {
        abort_if(Gate::denies('cemiterio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::with(['assinatura'])->get();

        $users = User::get();

        return view('admin.relatorios.cemiterios', compact('cemiterios', 'users'));
    }

    public function setores()
{
    abort_if(Gate::denies('setore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $setores = Setore::with(['cemiterio', 'assinatura'])->get();

    $cemiterios = Cemiterio::get();

    $users = User::get();

    return view('admin.relatorios.setores', compact('cemiterios', 'setores', 'users'));
}

public function quadras()
{
    abort_if(Gate::denies('quadra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $quadras = Quadra::with(['cemiterio', 'setor', 'assinatura'])->get();

    $cemiterios = Cemiterio::get();

    $setores = Setore::get();

    $users = User::get();

    return view('admin.relatorios.quadras', compact('cemiterios', 'quadras', 'setores', 'users'));
}

public function lotes()
{
    abort_if(Gate::denies('lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $lotes = Lote::with(['cemiterio', 'setor', 'quadra', 'assinatura'])->get();

    $cemiterios = Cemiterio::get();

    $setores = Setore::get();

    $quadras = Quadra::get();

    $users = User::get();

    return view('admin.relatorios.lotes', compact('cemiterios', 'lotes', 'quadras', 'setores', 'users'));
}

public function ossuarios()
{
    abort_if(Gate::denies('ossuario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $ossuarios = Ossuario::with(['cemiterio', 'assinatura'])->get();

    $cemiterios = Cemiterio::get();

    $users = User::get();

    return view('admin.relatorios.ossuarios', compact('cemiterios', 'ossuarios', 'users'));
}

public function gavetas()
{
    abort_if(Gate::denies('gavetum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $gaveta = Gavetum::with(['cemiterio', 'ossuario', 'assinatura'])->get();

    $cemiterios = Cemiterio::get();

    $ossuarios = Ossuario::get();

    $users = User::get();

    return view('admin.relatorios.gavetas', compact('cemiterios', 'gaveta', 'ossuarios', 'users'));
}

public function responsaveis()
{
    abort_if(Gate::denies('responsavel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $responsaveis = Responsavel::with(['assinatura'])->get();

    $users = User::get();

    return view('admin.relatorios.responsaveis', compact('responsaveis', 'users'));
}

public function obitoslotes()
{
    abort_if(Gate::denies('obitos_lotes_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $obitos = Obito::with(['responsavel', 'cemiterio', 'setor', 'quadra', 'lote', 'assinatura', 'media'])->get();

    $responsaveis = Responsavel::get();

    $cemiterios = Cemiterio::get();

    $setores = Setore::get();

    $quadras = Quadra::get();

    $lotes = Lote::get();

    $users = User::get();

    return view('admin.relatorios.obitosLote', compact('cemiterios', 'lotes', 'obitos', 'quadras', 'setores', 'responsaveis', 'users'));
}

public function obitosgavetas()
{
    abort_if(Gate::denies('obitos_gavetas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $obitosGavetas = ObitosGaveta::with(['responsavel', 'cemiterio', 'ossuario', 'gaveta', 'assinatura', 'media'])->get();

    $responsaveis = Responsavel::get();

    $cemiterios = Cemiterio::get();

    $ossuarios = Ossuario::get();

    $gaveta = Gavetum::get();

    $users = User::get();

    return view('admin.relatorios.obitosGaveta', compact('cemiterios', 'gaveta', 'obitosGavetas', 'ossuarios', 'responsaveis', 'users'));
}

public function comprasdelotes()
{
    abort_if(Gate::denies('compra_de_lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $compraDeLotes = CompraDeLote::with(['responsavel', 'assinatura'])->get();

    $obitos = Obito::get();

    $users = User::get();

    return view('admin.relatorios.compraDeLotes', compact('compraDeLotes', 'obitos', 'users'));
}

public function entrelotes()
{
    abort_if(Gate::denies('entre_lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $entreLotes = EntreLote::with(['Responsavel', 'falecido', 'cemiterio', 'setor', 'quadra', 'lote', 'cemiterio_destino', 'setor_destino', 'quadra_destino', 'lote_destino', 'assinatura'])->get();

    $responsavel = Responsavel::get();

    $obitos = Obito::get();

    $cemiterios = Cemiterio::get();

    $setores = Setore::get();

    $quadras = Quadra::get();

    $lotes = Lote::get();

    $users = User::get();

    return view('admin.relatorios.entreLotes', compact('cemiterios', 'entreLotes', 'lotes', 'obitos', 'quadras', 'setores', 'responsavel', 'users'));
}

public function entregavetas()
{
    abort_if(Gate::denies('entre_gaveta_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $entreGavetas = EntreGaveta::with(['responsavel', 'falecido', 'cemiterio', 'ossuario', 'gaveta', 'cemiterio_de_destino', 'ossuario_de_destino', 'gaveta_de_destino', 'assinatura'])->get();

    $responsavels = Responsavel::get();

    $obitos = ObitosGaveta::get();

    $cemiterios = Cemiterio::get();

    $ossuarios = Ossuario::get();

    $gaveta = Gavetum::get();

    $users = User::get();

    return view('admin.relatorios.entreGavetas', compact('cemiterios', 'entreGavetas', 'gaveta', 'obitos', 'ossuarios', 'responsavels', 'users'));
}

public function paralotes()
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

    return view('admin.relatorios.paraLotes', compact('cemiterios', 'gaveta', 'lotes', 'obitos', 'ossuarios', 'paraLotes', 'quadras', 'setores', 'responsavels', 'users'));
}

public function paragavetas()
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

    return view('admin.relatorios.paraGavetas', compact('cemiterios', 'gaveta', 'lotes', 'obitos', 'ossuarios', 'paraGavetas', 'quadras', 'setores', 'responsaveis', 'users'));
}

}
