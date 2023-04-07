@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Bem-vindo ao SJC Cemitério!
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-home">

<!-- Gestão Admin -->
@can('user_management_access')
<div class="container-size">
<div class="card"> <div class="card-header"> Gestão Admin </div> </div>
<div class="cards-icons">

@can('permission_access')

<div class="card-icons">
  <div class="card-body">
    <div class="card-icon">
    <a href="{{ route("admin.permissions.index") }}">
    <i class="icon fas fa-unlock-alt fa-5x"></i>
    <div class="lab"> <span> Permissões </span> </div>
    </a>
    </div>
  </div>
  </div>
@endcan


@can('role_access')

      <div class="card-icons">
        <div class="card-body">
          <div class="card-icon">
          <a href="{{ route("admin.roles.index") }}">
          <i class="icon fa fa-users fa-5x" ></i>
          <div class="lab"> <span> Grupo de Usuários </span> </div>
          </a>
          </div>
        </div>
        </div>

@endcan

@can('user_access')

<div class="card-icons">
<div class="card-body">
  <div class="card-icon">
  <a href="{{ route("admin.users.index") }}">
  <i class="icon fas fa-user fa-5x" ></i>
  <div class="lab"> <span> Usuários </span> </div>
  </a>
  </div>
</div>
</div>
@endcan

@can('audit_log_access')
                    <div class="card-icons">
                      <div class="card-body">
                        <div class="card-icon">
                        <a href="{{ route("admin.audit-logs.index") }}">
                        <i class="icon fas fa-eye fa-5x"></i>
                        <div class="lab"> <span> Auditoria </span> </div>
                        </a>
                        </div>
                      </div>
                      </div>
@endcan

          </div>
          </div>
@endcan

<!-- Cadastros -->
@can('cadastro_access')
<div class="container-size">
<div class="card"> <div class="card-header"> Cadastros </div> </div>
<div class="cards-icons">

@can('cemiterio_access')

<div class="card-icons">
  <div class="card-body">
    <div class="card-icon">
    <a href="{{ route("admin.cemiterios.index") }}">
    <i class="icon fas fa-coffin-cross fa-5x"></i>
    <div class="lab"> <span> Cemitérios </span> </div>
    </a>
    </div>
  </div>
  </div>
@endcan


@can('setore_access')

      <div class="card-icons">
        <div class="card-body">
          <div class="card-icon">
          <a href="{{ route("admin.setores.index") }}">
          <i class="icon fas fa-archway fa-5x" ></i>
          <div class="lab"> <span> Setores </span> </div>
          </a>
          </div>
        </div>
        </div>

@endcan

@can('quadra_access')

<div class="card-icons">
<div class="card-body">
  <div class="card-icon">
  <a href="{{ route("admin.quadras.index") }}">
  <i class="icon fas fa-cubes fa-5x" ></i>
  <div class="lab"> <span> Quadras </span> </div>
  </a>
  </div>
</div>
</div>

@endcan

@can('lote_access')
                    <div class="card-icons">
                      <div class="card-body">
                        <div class="card-icon">
                        <a href="{{ route("admin.lotes.index") }}">
                        <i class="icon fas fa-cube fa-5x"></i>
                        <div class="lab"> <span> Lotes </span> </div>
                        </a>
                        </div>
                      </div>
                      </div>
@endcan

@can('ossuario_access')
                    <div class="card-icons">
                      <div class="card-body">
                        <div class="card-icon">
                        <a href="{{ route("admin.ossuarios.index") }}">
                        <i class="icon fas fa-warehouse fa-5x"></i>
                        <div class="lab"> <span> Ossuários </span> </div>
                        </a>
                        </div>
                      </div>
                      </div>
@endcan

@can('gavetum_access')
                    <div class="card-icons">
                      <div class="card-body">
                        <div class="card-icon">
                        <a href="{{ route("admin.gaveta.index") }}">
                        <i class="icon fas fa-inbox fa-5x"></i>
                        <div class="lab"> <span> Gavetas </span> </div>
                        </a>
                        </div>
                      </div>
                      </div>
@endcan


@can('responsavel_access')
                    <div class="card-icons">
                      <div class="card-body">
                        <div class="card-icon">
                        <a href="{{ route("admin.responsaveis.index") }}">
                        <i class="icon fas fa-user-tie fa-5x"></i>
                        <div class="lab"> <span> Responsáveis </span> </div>
                        </a>
                        </div>
                      </div>
                      </div>
@endcan

          </div>
          </div>
@endcan

<!-- Lançamentos -->
@can('lancamento_access')

<div class="container-size">
<div class="card"> <div class="card-header"> Lançamentos </div> </div>
<div class="cards-icons">

@can('obitos_lotes_access')

<div class="card-icons">
  <div class="card-body">
    <div class="card-icon">
    <a href="{{ route("admin.obitos-lotes.index") }}">
    <i class="fas fa-skull-crossbones" style="font-size: 2rem; margin-top: -10px;"></i>
    <i class="icon fas fa-cube" style="font-size: 3.5rem; margin-top: 40px;"></i>
    <div class="lab" style="margin-top: 3.6rem;"> <span> Óbitos em Lotes </span> </div>
    </a>
    </div>
  </div>
  </div>

@endcan


@can('obitos_gavetas_access')

  <div class="card-icons">
    <div class="card-body">
      <div class="card-icon">
      <a href="{{ route("admin.obitos-gavetas.index") }}">
      <i class="fas fa-skull-crossbones" style="font-size: 2rem; margin-top: -10px;"></i>
      <i class="icon fas fa-inbox" style="font-size: 3.5rem; margin-top: 40px;"></i>
      <div class="lab" style="margin-top: 3.6rem;"> <span> Óbitos em Gavetas </span> </div>
      </a>
      </div>
    </div>
    </div>

@endcan

  <div class="card-icons">
    <div class="card-body">
      <div class="card-icon">
      <a href="{{ route('admin.mapa', $cemiterio->id) }}">
      <i class="icon fa-solid fa-map-location-dot fa-5x" style="margin-top: 10px;"></i>
      <div class="lab" style="margin-top: 80px;"> <span> Mapa </span> </div>
      </a>
      </div>
    </div>
    </div>


          </div>
          </div>
@endcan

<!-- Transferências -->

@can('transferencium_access')
<div class="container-size">
<div class="card"> <div class="card-header"> Transferências </div> </div>
<div class="cards-icons">

@can('entre_lote_access')

<div class="card-icons">
  <div class="card-body">
    <div class="card-icon">
    <a href="{{ route("admin.entre-lotes.index") }}">
    <i class="fas fa-exchange-alt" style="font-size: 2rem; margin-top: -10px;"></i>
    <i class="icon fas fa-cube" style="font-size: 3.5rem; margin-top: 40px;"></i>
    <div class="lab" style="margin-top: 3.6rem;"> <span> Entre Lotes </span> </div>
    </a>
    </div>
  </div>
  </div>

@endcan

@can('entre_gaveta_access')

<div class="card-icons">
  <div class="card-body">
    <div class="card-icon">
    <a href="{{ route("admin.entre-gavetas.index") }}">
    <i class="fas fa-exchange-alt" style="font-size: 2rem; margin-top: -10px;"></i>
    <i class="icon fas fa-inbox" style="font-size: 3.5rem; margin-top: 40px;"></i>
    <div class="lab" style="margin-top: 3.6rem;"> <span> Entre Gavetas </span> </div>
    </a>
    </div>
  </div>
  </div>

@endcan

@can('para_lote_access')

      <div class="card-icons">
        <div class="card-body">
          <div class="card-icon">
          <a href="{{ route("admin.para-lotes.index") }}">
          <i class="fas fa-share" style="font-size: 2rem; margin-top: -10px;"></i>
          <i class="icon fas fa-cube" style="font-size: 3.5rem; margin-top: 40px;"></i>
          <div class="lab" style="margin-top: 3.6rem;"> <span> Para Lotes </span> </div>
          </a>
          </div>
        </div>
        </div>

@endcan

@can('para_gaveta_access')

      <div class="card-icons">
        <div class="card-body">
          <div class="card-icon">
          <a href="{{ route("admin.para-gavetas.index") }}">
          <i class="fas fa-share" style="font-size: 2rem; margin-top: -10px;"></i>
          <i class="icon fas fa-inbox" style="font-size: 3.5rem; margin-top: 40px;"></i>
          <div class="lab" style="margin-top: 3.6rem;"> <span> Para Gavetas </span> </div>
          </a>
          </div>
        </div>
        </div>

@endcan

          </div>
          </div>
@endcan


<!-- Relatórios -->

@can('relatorios_access')
<div class="container-size">
<div class="card"> <div class="card-header"> Relatórios </div> </div>
<div class="cards-icons">

     @can('user_access')

      <div class="card-icons">
        <div class="card-body">
          <div class="card-icon">
          <a href="{{ route("admin.relatorios.users") }}">
          <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
          <i class="icon fas fa-user" style="font-size: 3.5rem; margin-top: 40px;"></i>
          <div class="lab" style="margin-top: 3.6rem;"> <span> Usuários </span> </div>
          </a>
          </div>
        </div>
        </div>

        @endcan

        @can('cemiterio_access')

        <div class="card-icons">
          <div class="card-body">
            <div class="card-icon">
            <a href="{{ route("admin.relatorios.cemiterios") }}">
            <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
            <i class="icon fas fa-coffin-cross" style="font-size: 3.5rem; margin-top: 40px;"></i>
            <div class="lab" style="margin-top: 3.6rem;"> <span> Cemitérios </span> </div>
            </a>
            </div>
          </div>
          </div>

          @endcan

          @can('setore_access')

          <div class="card-icons">
            <div class="card-body">
              <div class="card-icon">
              <a href="{{ route("admin.relatorios.setores") }}">
              <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
              <i class="icon fas fa-archway" style="font-size: 3.5rem; margin-top: 40px;"></i>
              <div class="lab" style="margin-top: 3.6rem;"> <span> Setores </span> </div>
              </a>
              </div>
            </div>
            </div>

            @endcan

            @can('quadra_access')

            <div class="card-icons">
              <div class="card-body">
                <div class="card-icon">
                <a href="{{ route("admin.relatorios.quadras") }}">
                <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                <i class="icon fas fa-cubes" style="font-size: 3.5rem; margin-top: 40px;"></i>
                <div class="lab" style="margin-top: 3.6rem;"> <span> Quadras </span> </div>
                </a>
                </div>
              </div>
              </div>

              @endcan

              @can('lote_access')

              <div class="card-icons">
                <div class="card-body">
                  <div class="card-icon">
                  <a href="{{ route("admin.relatorios.lotes") }}">
                  <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                  <i class="icon fas fa-cube" style="font-size: 3.5rem; margin-top: 40px;"></i>
                  <div class="lab" style="margin-top: 3.6rem;"> <span> Lotes </span> </div>
                  </a>
                  </div>
                </div>
                </div>

                @endcan

                @can('ossuario_access')

                <div class="card-icons">
                  <div class="card-body">
                    <div class="card-icon">
                    <a href="{{ route("admin.relatorios.ossuarios") }}">
                    <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                    <i class="icon fas fa-warehouse" style="font-size: 3.5rem; margin-top: 40px;"></i>
                    <div class="lab" style="margin-top: 3.6rem;"> <span> Ossuários </span> </div>
                    </a>
                    </div>
                  </div>
                  </div>

                  @endcan

                  @can('gavetum_access')

                  <div class="card-icons">
                    <div class="card-body">
                      <div class="card-icon">
                      <a href="{{ route("admin.relatorios.gavetas") }}">
                      <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                      <i class="icon fas fa-inbox" style="font-size: 3.5rem; margin-top: 40px;"></i>
                      <div class="lab" style="margin-top: 3.6rem;"> <span> Gavetas </span> </div>
                      </a>
                      </div>
                    </div>
                    </div>

                    @endcan

                    @can('responsavel_access')

                    <div class="card-icons">
                      <div class="card-body">
                        <div class="card-icon">
                        <a href="{{ route("admin.relatorios.responsaveis") }}">
                        <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                        <i class="icon fas fa-user-tie" style="font-size: 3.5rem; margin-top: 40px;"></i>
                        <div class="lab" style="margin-top: 3.6rem;"> <span> Responsáveis </span> </div>
                        </a>
                        </div>
                      </div>
                      </div>

                      @endcan

                      @can('obitos_lotes_access')

                      <div class="card-icons">
                        <div class="card-body">
                          <div class="card-icon">
                          <a href="{{ route("admin.relatorios.obitos-lotes") }}">
                          <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                          <i class="fas fa-skull-crossbones" style="font-size: 2rem; margin-top: -10px;"></i>
                          <i class="icon fas fa-cube" style="font-size: 3.5rem; margin-top: 40px;"></i>
                          <div class="lab" style="margin-top: 3.6rem;"> <span> Obitos em Lotes </span> </div>
                          </a>
                          </div>
                        </div>
                        </div>

                        @endcan

                        @can('obitos_gavetas_access')

                        <div class="card-icons">
                          <div class="card-body">
                            <div class="card-icon">
                            <a href="{{ route("admin.relatorios.obitos-gavetas") }}">
                            <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                            <i class="fas fa-skull-crossbones" style="font-size: 2rem; margin-top: -10px;"></i>
                            <i class="icon fas fa-inbox" style="font-size: 3.5rem; margin-top: 40px;"></i>
                            <div class="lab" style="margin-top: 3.6rem;"> <span> Obitos em Gavetas </span> </div>
                            </a>
                            </div>
                          </div>
                          </div>

                          @endcan

                            @can('entre_lote_access')

                            <div class="card-icons">
                              <div class="card-body">
                                <div class="card-icon">
                                <a href="{{ route("admin.relatorios.entre-lotes") }}">
                                <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                                <i class="fas fa-exchange-alt" style="font-size: 2rem; margin-top: -10px;"></i>
                                <i class="icon fas fa-cube" style="font-size: 3.5rem; margin-top: 40px;"></i>
                                <div class="lab" style="margin-top: 3.6rem; font-size: 11px;"> <span> Transf. entre lotes </span> </div>
                                </a>
                                </div>
                              </div>
                              </div>

                              @endcan

                              @can('entre_gaveta_access')

                              <div class="card-icons">
                                <div class="card-body">
                                  <div class="card-icon">
                                  <a href="{{ route("admin.relatorios.entre-gavetas") }}">
                                  <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                                  <i class="fas fa-exchange-alt" style="font-size: 2rem; margin-top: -10px;"></i>
                                  <i class="icon fas fa-inbox" style="font-size: 3.5rem; margin-top: 40px;"></i>
                                  <div class="lab" style="margin-top: 3.6rem; font-size: 11px;"> <span> Transf. entre gavetas </span> </div>
                                  </a>
                                  </div>
                                </div>
                                </div>

                                @endcan

                                @can('para_lote_access')

                                <div class="card-icons">
                                  <div class="card-body">
                                    <div class="card-icon">
                                    <a href="{{ route("admin.relatorios.para-lotes") }}">
                                    <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                                    <i class="fas fa-share" style="font-size: 2rem; margin-top: -10px;"></i>
                                    <i class="icon fas fa-cube" style="font-size: 3.5rem; margin-top: 40px;"></i>
                                    <div class="lab" style="margin-top: 3.6rem; font-size: 11px;"> <span> Transf. para lote </span> </div>
                                    </a>
                                    </div>
                                  </div>
                                  </div>

                                  @endcan

                                  @can('para_gaveta_access')

                                  <div class="card-icons">
                                    <div class="card-body">
                                      <div class="card-icon">
                                      <a href="{{ route("admin.relatorios.para-gavetas") }}">
                                      <i class="fa-duotone fa-comment-lines" style="font-size: 2rem; margin-top: -10px;"></i>
                                      <i class="fas fa-share" style="font-size: 2rem; margin-top: -10px;"></i>
                                      <i class="icon fas fa-inbox" style="font-size: 3.5rem; margin-top: 40px;"></i>
                                      <div class="lab" style="margin-top: 3.6rem; font-size: 11px;"> <span> Transf. para gaveta </span> </div>
                                      </a>
                                      </div>
                                    </div>
                                    </div>

                                    @endcan


          </div>
          </div>
@endcan

</div>

<link rel="stylesheet" href="{{ url('css/icons.css') }}">
<link rel="stylesheet" href="{{ url('css/home.css') }}">

@endsection
@section('scripts')
@parent

@endsection
