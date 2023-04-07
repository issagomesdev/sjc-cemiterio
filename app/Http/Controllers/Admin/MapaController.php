<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cemiterio;
use App\Models\Lote;
use App\Models\Quadra;
use App\Models\Setore;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MapaController extends Controller
{
    public function index($id)
    {
        abort_if(Gate::denies('lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::with(['assinatura'])->get();
        $cemiterio = Cemiterio::with(['assinatura'])->where('id', $id)->first();
        $lotes = Lote::with(['cemiterio', 'setor', 'quadra', 'assinatura'])->where('cemiterio_id', $cemiterio->id)->get();

        return view('admin.mapa.index', compact('cemiterios', 'cemiterio', 'lotes'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cemiterios = Cemiterio::with(['assinatura'])->get();
        $cemiterio = Cemiterio::with(['assinatura'])->where('id', $id)->first();
        $lotes = Lote::with(['cemiterio', 'setor', 'quadra', 'assinatura'])->where('cemiterio_id', $cemiterio->id)->get();

        return view('admin.mapa.edit', compact('cemiterios', 'cemiterio', 'lotes'));
    }

    public function insert(Request $request)
    {
        abort_if(Gate::denies('lote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //
        $data = json_decode($request->data);
        //

        $array_lote = [];

        if($data) {
        //
        unset($data->mapa_edit->canvas);

        if($data->mapa_edit){

        foreach ($data->mapa_edit as $datas) {
            if(isset($datas->lote_id)) {
            $lote = Lote::where('id', $datas->lote_id)->first();
            $lote->update(['map_lat' => $datas->coords->lat, 'map_long' => $datas->coords->long, ]);
        }
         }


        foreach ($data->mapa_edit as $datas) {
            if($data->mapa_edit){
            array_push($array_lote, $datas->lote_id);
            }
        }

      }
    }

    Lote::whereNotIn('id', $array_lote)
        ->where('cemiterio_id', $request->cemiterio_id)
        ->update(['map_lat' => null, 'map_long' => null ]);

    return redirect()->route('admin.mapa', $request->cemiterio_id);

    }
}
