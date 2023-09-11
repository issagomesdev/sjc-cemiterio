@extends('layouts.admin')
@section('content')
<style>
    :root {
        --pin-image: url('{{ asset("map/img/pin.png") }}');
        --spin-image: url('{{ asset("map/img/spin.png") }}');
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ url('map/css/style.css') }}">
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="content">
      <div class="content-map">
        <div class="map">
            @if($cemiterio->foto_do_cemiterio)
            <div id="map" ondrop="drop(event)" ondragover="allowDrop(event)">
                <img src="{{ $cemiterio->foto_do_cemiterio->getUrl() }}" style="user-select: none;" alt="Map">
                <div id="pins"> </div>
                </div>
            </div>
            @else
            <div style="width:100%;margin:auto;">
                 <a target="_blank" style="display: inline-block">
                 Este cemitério não possui foto anexada ao seu cadastrado.
                </a>
            </div>
            @endif
        </div>
      @if($cemiterio->foto_do_cemiterio)
      <div class="actions">
        <div class="bttn" id="filter-pin-button"> <i class="fa fa-search"></i> </div>
        <form id="go-to-edit" action="{{ route('admin.mapa.edit', $cemiterio->id) }}" method="GET"> </form>
        <div class="bttn" onclick="document.getElementById('go-to-edit').submit()"> <i class="fa-solid fa fa-pencil"></i> </div>
        <div class="bttn" id="labels-button" status="hidden"> <i class="fa-solid fa-eye-slash"></i> </div>
      </div>
      @endif
    </div>
    <div id="edit-pin" class="modal">
      <div class="close">
        <div class="closeB" id="closeEdit"> × </div>
      </div>
      <div id="form"> </div>
    </div>
    <div id="filter-pin" class="modal">
      <div class="close">
        <div class="closeB" id="closeFilter"> × </div>
      </div>
      <div class="search-set">
        <div class="search icon"> <i class="fa fa-search"> </i> </div>
        <input class="search input" id="search" type="text">
      </div>
      <div class="list-pins"> </div>
    </div>
  </div>

  
<script type="text/javascript">
    var increment = 1; // auto increment
    const pins = [
        @foreach($lotes as $key => $item)     
        @if($item->map_long && $item->map_lat)
        {
        "id": increment++,
        "lote_id": "{{$item->id}}",
        "name": "{{$item->indentificacao}}",
        "Falecido":'{{ $item->obito->nome_do_falecido ?? 'Não atribuído' }}',
        "Descricao":'{{$item->descricao}}',
        "Comprimento":'{{$item->comprimento}}',
        "Altura":'{{$item->altura}}',
        "Lote_vazio":'{{$item->lote_vazio}}',
        "Reservado":'{{$item->reservado}}',
        "Cemiterio":'{{$item->cemiterio->nome}}',
        "Setor":'{{$item->setor->indentificacao}}',
        "Quadra":'{{$item->quadra->indentificacao}}',
        "url": '{{ route('admin.lotes.show', $item->id) }}',
        "x": "{{$item->map_lat}}",
        "y": "{{$item->map_long}}",
        "up": 1,
      },
      @endif
      @endforeach      
    ];
</script>
<script type="text/javascript" src="{{ url('map/js/script.js') }}"></script>
<script> showMode(); </script>

@endsection
