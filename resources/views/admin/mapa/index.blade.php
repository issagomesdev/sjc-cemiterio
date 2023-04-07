@extends('layouts.admin')
@section('content')


<link rel="stylesheet" type="text/css" href="{{ url('map/css/normalize.css') }}"  media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url('map/css/stylesheet.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url('map/css/github-light.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url('map/css/bootstrap.min.css') }}" media="screen">
    <script type="text/javascript" src="{{ url('map/js/jquery-2.2.0.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{ url('map/js/jquery.easypin.min.js') }}"></script>
    <style type="text/css">
        .exPopoverContainer {position: relative;color:#514f4f;bottom:28px!important;left:-21px;}
        .popBg {width:100%;height:100%;position:relative;}
        .popBody {width:100%;height:100%;position: relative;padding:10px;}
        .popBody h1 {padding-bottom:5px;margin:0px;font-size:18px;}
        .popHeadLine {clear:both;width:100%;height:1px;background-color:#d6d6d6;margin:auto;}
        .popContentLeft {-webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px; background-color:#f1f1f1;width:178px;float: left;font-size:11px;text-align:left;margin-top: 10px;}
        .popContentRight {width:100px;float: right;margin-top: 10px;text-align: center;font-size:40px;}
        .container-fluid { margin-top: 20rem !important; }
        .mapcont {
        width: 100%;
        height: 100%;
        background-color: #fff;
        border-radius: 2px;
        margin-bottom: 30px;
        padding: 30px; }

        select.search {
    height: 40px;
    border-width: 1px;
    border-radius: 3px;
    border-color: #545454;
}

.mapimg {
    width: 90%;
    height: 90%;
}

.card-body {
    display: flex;
}

.bttn {
  border-radius: 4px;
  border: 0;
  box-shadow: rgba(1,60,136,.5) 0 -1px 3px 0 inset,rgba(0,44,97,.1) 0 3px 6px 0;
  box-sizing: border-box;
  color: #fff;
  display: inherit;
  font-family: "Space Grotesk",-apple-system,system-ui,"Segoe UI",Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 10px;
  font-weight: 700;
  line-height: 24px;
  margin-left: 5px;
  height: 40px;
  width: 10%;
  padding: 16px 20px;
  position: relative;
  text-align: center;
  align-items: center;
  justify-content: center;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  transition: all .2s cubic-bezier(.22, .61, .36, 1);
}

.bedit:hover {
  background-color: #ffb765;
  transform: translateY(-2px);
}

.bedit {
    background-color: #f79c34
}

.datas {
    margin-bottom: 5px;
    margin-top: 5px;
}

a.dataLab {
    font-weight: bold;
}

</style>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Mapas
                </div>

                <div class="card-body">
                <select class="search" onchange="window.location.href = this.value;" style="width: 100%;">
                   @foreach($cemiterios as $key => $item)
                     <option {{ $cemiterio->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nome }}</option>
                   @endforeach
                 </select>
                 <button class="bttn bedit" onclick="window.location.href = 'edit/{{$cemiterio->id}}'"> <i class="fa-solid fa-pen fa-2x"></i> </button>
                </div>


            </div>
        </div>
    </div>
</div>
   <div class="mapcont">
   @if($cemiterio->foto_do_cemiterio)
   <div style="width:1000px;height:650px;margin:auto;">
   <img src="{{ $cemiterio->foto_do_cemiterio->getUrl() }}" width="1000px"; height="650px"; class="pin" easypin-id="mapa-show" />
   </div>
   @else
   <div style="width:100%;margin:auto;">
     <a target="_blank" style="display: inline-block">
     Este cemitério não possui foto anexada ao seu cadastrado.
     </a>
     </div>
    @endif


    </div>

    <div style="display:none;" easypin-tpl>
        <popover>
            <div class="exPopoverContainer"> <div class="popContentLeft"> <div class="datasContent"> <div class="popBg borderRadius"> <div class="popBody">
                <div class="arrow-down" style="top: 170px;left: 13px;"></div>
                <h1>{[Identificação]}</h1>
                <div class="popHeadLine"></div>
                <div class="datas">
                 <div> <a class="dataLab"> Descrição: </a> {[Descrição]} </div>
                 <div> <a class="dataLab"> Comprimento: </a> {[Comprimento]} </div>
                 <div> <a class="dataLab"> Altura: </a> {[Altura]} </div>
                 <div> <a class="dataLab"> Lote Vazio? </a> {[Lote_vazio]} </div>
                 <div> <a class="dataLab"> Lote Reservado? </a> {[Reservado]} </div>
                 <div> <a class="dataLab"> Cemitério: </a> {[Cemitério]} </div>
                 <div> <a class="dataLab"> Setor: </a> {[Setor]} </div>
                 <div> <a class="dataLab"> Quadra: </a> {[Quadra]} </div>
                 </div>
                 <div class="goLote">
                    <a href="/admin/lotes/{[id]}">Visualizar lote</a>
                  </div>
            </div> </div> </div> </div> </div>
        </popover>

        <marker>
            <div class="marker2 element-animation">
              <img src="{{ url('map/img/pin.png') }}" width="25px" height="auto" />
            </div>
        </marker>
    </div>
    <script type="text/javascript">

            $('.pin').easypinShow({
                responsive: true,
                data: {
                  "mapa-show":
                  {
                    @foreach($lotes as $key => $item)
                    @if($item->map_long && $item->map_lat)
                    {{$key}}:{
                      "id":'{{$item->id}}',
                      "Identificação":'{{$item->indentificacao}}',
                      "Descrição":'{{$item->descricao}}',
                      "Comprimento":'{{$item->comprimento}}',
                      "Altura":'{{$item->altura}}',
                      "Lote_vazio":'{{$item->lote_vazio}}',
                      "Reservado":'{{$item->reservado}}',
                      "Cemitério":'{{$item->cemiterio->nome}}',
                      "Setor":'{{$item->setor->indentificacao}}',
                      "Quadra":'{{$item->quadra->indentificacao}}',
                      "coords":{
                        "lat":{{$item->map_lat}},
                        "long":{{$item->map_long - 25}}
                     }
                    },
                    @endif
                    @endforeach
                    @if($cemiterio->foto_do_cemiterio)
                    "canvas":{
                        "src":"{{ $cemiterio->foto_do_cemiterio->getUrl() }}","width":"1000","height":"650"
                    }
                    @endif
                  }
              },

            });

    </script>


@endsection
