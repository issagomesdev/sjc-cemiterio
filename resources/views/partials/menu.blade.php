<div class="sidebar-div">
<div class="sidebar" data-ativo="close">

    <div class="nav-div">
    <ul class="nav-links">
      <div class="logo-details">
        <div class="logo" > <img class="logo" src="{{ url('site/images/logo.png') }}" alt="sjcsistemas" width="70px" height="auto"> </div>
        <span class="logo_name"> SJC Cemitério </span>
      </div>

      <li>
        <a href="{{ route("admin.home") }}">
          <i class='fas fa-home c-sidebar-nav-icon'></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route("admin.home") }}">Home</a></li>
        </ul>
      </li>

    @can('user_management_access')
      <li>
        <div class="iocn-link">
          <a>
            <i class='fas fa-users-cog c-sidebar-nav-icon' ></i>
            <span class="link_name"> Gestão Admin </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name"> Gestão Admin </a></li>
          @can('permission_access') <li><a href="{{ route("admin.permissions.index") }}"> Permissões </a></li> @endcan
          @can('role_access') <li><a href="{{ route("admin.roles.index") }}"> Grupo de Usuários </a></li> @endcan
          @can('user_access') <li><a href="{{ route("admin.users.index") }}"> Usuários </a></li> @endcan
          @can('audit_log_access') <li><a href="{{ route("admin.audit-logs.index") }}"> Auditoria </a></li> @endcan
        </ul>
      </li>
      @endcan

      @can('cadastro_access')
        <li>
          <div class="iocn-link">
            <a>
              <i class='fas fa-pen-alt c-sidebar-nav-icon' ></i>
              <span class="link_name"> Cadastros </span>
            </a>
            <i class='bx bxs-chevron-down arrow' ></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name"> Cadastros </a></li>
            @can('cemiterio_access') <li> <a href="{{ route("admin.cemiterios.index") }}"> Cemitérios </a> </li> @endcan
            @can('setore_access') <li> <a href="{{ route("admin.setores.index") }}"> Setores </a> </li> @endcan
            @can('quadra_access') <li> <a href="{{ route("admin.quadras.index") }}"> Quadras </a> </li> @endcan
            @can('lote_access') <li> <a href="{{ route("admin.lotes.index") }}"> Lotes </a> </li> @endcan
            @can('ossuario_access') <li> <a href="{{ route("admin.ossuarios.index") }}"> Ossuários </a> </li> @endcan
            @can('gavetum_access') <li> <a href="{{ route("admin.gaveta.index") }}"> Gavetas </a> </li> @endcan
            @can('responsavel_access') <li> <a href="{{ route("admin.responsaveis.index") }}"> Responsáveis </a> </li> @endcan
          </ul>
        </li>
        @endcan

        @can('lancamento_access')
          <li>
            <div class="iocn-link">
              <a>
                <i class='fas fa-paper-plane c-sidebar-nav-icon'></i>
                <span class="link_name"> Lançamentos </span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name"> Lançamentos </a></li>
              @can('obitos_lotes_access') <li> <a href="{{ route("admin.obitos-lotes.index") }}"> Óbitos em Lotes </a> </li> @endcan
              @can('obitos_gavetas_access') <li> <a href="{{ route("admin.obitos-gavetas.index") }}"> Óbitos em Gavetas </a> </li> @endcan
            </ul>
          </li>
          @endcan

          @can('transferencium_access')
            <li>
              <div class="iocn-link">
                <a>
                  <i class='fas fa-exchange-alt c-sidebar-nav-icon'></i>
                  <span class="link_name"> Transferências </span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
              </div>
              <ul class="sub-menu">
                <li><a class="link_name"> Transferências </a></li>
                @can('entre_lote_access') <li> <a href="{{ route("admin.entre-lotes.index") }}"> Entre Lotes </a> </li> @endcan
                @can('entre_gaveta_access') <li> <a href="{{ route("admin.entre-gavetas.index") }}"> Entre Gavetas </a> </li> @endcan
                @can('para_lote_access') <li> <a href="{{ route("admin.para-lotes.index") }}"> Para Lotes </a> </li> @endcan
                @can('para_gaveta_access') <li> <a href="{{ route("admin.para-gavetas.index") }}"> Para Gavetas </a> </li> @endcan
              </ul>
            </li>
            @endcan

            @can('relatorios_access')
              <li>
                <div class="iocn-link">
                  <a>
                    <i class='fa-solid fa-comment-lines c-sidebar-nav-icon'></i>
                    <span class="link_name"> Relatórios </span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                  <li> <a class="link_name"> Relatórios </a></li>
                  @can('user_access') <li> <a href="{{ route("admin.relatorios.users") }}"> Usuários </a> </li> @endcan
                  @can('cemiterio_access') <li> <a href="{{ route("admin.relatorios.cemiterios") }}"> Cemitérios </a> </li> @endcan
                  @can('setore_access') <li> <a href="{{ route("admin.relatorios.setores") }}"> Setores </a> </li> @endcan
                  @can('quadra_access') <li> <a href="{{ route("admin.relatorios.quadras") }}"> Quadras </a> </li> @endcan
                  @can('lote_access') <li> <a href="{{ route("admin.relatorios.lotes") }}"> Lotes </a> </li> @endcan
                  @can('ossuario_access') <li> <a href="{{ route("admin.relatorios.ossuarios") }}"> Ossuários </a> </li> @endcan
                  @can('gavetum_access') <li> <a href="{{ route("admin.relatorios.gavetas") }}"> Gavetas </a> </li> @endcan
                  @can('responsavel_access') <li> <a href="{{ route("admin.relatorios.responsaveis") }}"> Responsáveis </a> </li> @endcan
                  @can('obitos_lotes_access') <li> <a href="{{ route("admin.relatorios.obitos-lotes") }}"> Obitos em Lotes </a> </li> @endcan
                  @can('obitos_gavetas_access') <li> <a href="{{ route("admin.relatorios.obitos-gavetas") }}"> Obitos em Gavetas </a> </li> @endcan
                  @can('entre_lote_access') <li> <a href="{{ route("admin.relatorios.entre-lotes") }}"> Transf. entre lotes </a> </li> @endcan
                  @can('entre_gaveta_access') <li> <a href="{{ route("admin.relatorios.entre-gavetas") }}"> Transf. entre gavetas </a> </li> @endcan
                  @can('para_lote_access') <li> <a href="{{ route("admin.relatorios.para-lotes") }}"> Transf. para lote </a> </li> @endcan
                  @can('para_gaveta_access') <li> <a href="{{ route("admin.relatorios.para-gavetas") }}"> Transf. para gaveta </a> </li> @endcan
                </ul>
              </li>
              @endcan

    <div class="profile-details">
      <div class="profile-content" id="profile-edit">
        @if(auth()->user()->foto_de_perfil)
        <img src="{{ auth()->user()->foto_de_perfil->getUrl() }}">
        @else
        <img src="{{ url('null/nullphoto.png') }}">
        @endif
      </div>
      <div class="name-job">
        <div class="user-roles"> <div class="profile_name" style="overflow: hidden; text-overflow: ellipsis;"> {{Auth::user()->name}} </div> </div>
        <div class="job"> <div class="user-roles"> @foreach(Auth::user()->roles as $role) <span class="badge badge-info"> {{ $role->title }} </span> @endforeach </div> </div>
      </div>
      <a class="log-out" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"> <i class='bx bx-log-out'> </i> </a>
    </div>
  </li>
</ul>
  </div>
  </div>

  @section('scripts') @parent <script> $('#profile-edit').click(function(){ window.location = "{{ route('profile.password.edit') }}"; }); </script> @endsection
  <style>

.sub {
      display: block !important;
      text-transform: uppercase;
  }

  .sidebar .nav-links li.dec-menu {
    list-style: disc;
}

  .container-fluid {
      margin-top: 12rem;
  }

  #profile-edit{
    cursor: pointer;
  }
  .user-roles {
    word-wrap: break-word;
    white-space: pre-wrap;
    width: 150px; }

    span.badge.badge-info {
    margin-bottom: 3px;
    margin-left: 2px;
}

.user-roles {
    display: flex;
    flex-wrap: wrap;
    word-wrap: break-word;
    white-space: pre-wrap;
    width: 110px;
}

.badge-info {
    color: #e9ecef;
    background-color: rgba(136, 230, 247, 0.5);
}
  </style>

  <link rel="stylesheet" href="{{ url('menu-drop/menu.css') }}">
  <link rel="stylesheet" href="{{ url('menu-drop/drop-menu.css') }}">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'
