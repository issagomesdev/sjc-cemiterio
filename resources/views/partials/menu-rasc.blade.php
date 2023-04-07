<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('cadastro_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/cemiterios*") ? "c-show" : "" }} {{ request()->is("admin/setores*") ? "c-show" : "" }} {{ request()->is("admin/quadras*") ? "c-show" : "" }} {{ request()->is("admin/lotes*") ? "c-show" : "" }} {{ request()->is("admin/ossuarios*") ? "c-show" : "" }} {{ request()->is("admin/gaveta*") ? "c-show" : "" }} {{ request()->is("admin/solicitantes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cadastro.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('cemiterio_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cemiterios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cemiterios") || request()->is("admin/cemiterios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cemiterio.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setore_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.setores.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/setores") || request()->is("admin/setores/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setore.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('quadra_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.quadras.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/quadras") || request()->is("admin/quadras/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.quadra.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lote_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.lotes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lotes") || request()->is("admin/lotes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.lote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ossuario_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.ossuarios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ossuarios") || request()->is("admin/ossuarios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ossuario.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('gavetum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.gaveta.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gaveta") || request()->is("admin/gaveta/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.gavetum.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('solicitante_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.solicitantes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/solicitantes") || request()->is("admin/solicitantes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.solicitante.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('lancamento_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/obitos*") ? "c-show" : "" }} {{ request()->is("admin/compra-de-lotes*") ? "c-show" : "" }} {{ request()->is("admin/recadastramentos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-reply-all c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.lancamento.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('obito_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.obitos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/obitos") || request()->is("admin/obitos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-reply c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.obito.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('compra_de_lote_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.compra-de-lotes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/compra-de-lotes") || request()->is("admin/compra-de-lotes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-reply c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.compraDeLote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('recadastramento_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.recadastramentos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/recadastramentos") || request()->is("admin/recadastramentos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-reply c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.recadastramento.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('transferencium_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/entre-lotes*") ? "c-show" : "" }} {{ request()->is("admin/para-ossuarios*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-exchange-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.transferencium.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('entre_lote_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.entre-lotes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/entre-lotes") || request()->is("admin/entre-lotes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-long-arrow-alt-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.entreLote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('para_ossuario_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.para-ossuarios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/para-ossuarios") || request()->is("admin/para-ossuarios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-long-arrow-alt-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paraOssuario.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
