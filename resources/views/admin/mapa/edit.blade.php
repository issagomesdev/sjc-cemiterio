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

.bcheck:hover {
  background-color: #7be5b7;
  transform: translateY(-2px);
}

.bcheck {
    background-color: #2dce89;
}

.easy-marker:hover .popover {
    display: inline !important;
    margin-top: -35px;
}

.easy-marker:hover {
    z-index: 99 !important;
}

.easy-marker:active {
    cursor: grabbing !important;
}

.popover {
    display: none !important;
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
                 <button class="bttn bcheck coords"> <i class="fa-solid fa-circle-check fa-2x"></i> </button>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="mapcont">
   @if($cemiterio->foto_do_cemiterio)
   <div style="width:1000px;height:650px;margin:auto;">
   <img src="{{ $cemiterio->foto_do_cemiterio->getUrl() }}" width="1000px"; height="650px"; class="pin" easypin-id="mapa_edit" />
   </div>
   @else
   <div style="width:100%;margin:auto;">
     <a target="_blank" style="display: inline-block">
     Este cemitério não possui foto anexada ao seu cadastrado.
     </a>
     </div>
    @endif


    </div>

    <div class="easy-modal" style="display:none;" modal-position="free">
        <form>
            <h3> Lote de destino </h3>
            <select class="form-control" name="lote_id" onChange="setContent(this);">
            <option value> Selecione por favor </option>
            @foreach($lotes as $key => $item)
            <option value="{{ $item->id }}">{{ $item->indentificacao }}</option>
            @endforeach
            </select>
            <input type="hidden" id="content" name="content"/>
            <button style="margin-top: 10px;" type="button" class="btn btn-primary easy-submit"> Salvar </button>
        </form>
    </div>

    <script>
        function setContent(sel) {
            var setContentValue=sel.options[sel.selectedIndex].text;
            document.getElementById("content").value=setContentValue; }
    </script>

    <div style="display: none;" width="130" shadow="true" popover>
        <div style="width:100%;text-align:center;">{[content]}</div>
    </div>

    <script type="text/javascript">


var $instance = $('.pin').easypin({
    init: {
        "mapa_edit":{
            @foreach($lotes as $key => $item)
            @if($item->map_long && $item->map_lat)
            {{$key}}:{
                "lote_id": {{$item->id}},
                "content":'{{$item->indentificacao}}',
                "coords":{
                    "lat":{{$item->map_lat}},
                    "long":{{$item->map_long}}
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
    }
});

        $instance.easypin.event( "get.coordinates", function($instance, data, params ) {

            window.location.href = '{{ route("admin.mapa.insert") }}' + '?cemiterio_id=' + {{$cemiterio->id}} + '&data=' + data

        });

        $( ".coords" ).click(function(e) {
            $instance.easypin.fire( "get.coordinates", {param1: 1, param2: 2, param3: 3}, function(data) {
                return JSON.stringify(data);
            });
        });
    </script>

@endsection
