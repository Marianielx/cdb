<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.home') }}" class="">
            <img src="{{ asset('site/img/logo.svg') }}" alt="" class="img-fluid">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Painel Principal</div>
            </a>
        </li>

        <!-- Site -->
        <li class="menu-item">
            <a href="{{ route('site.home') }}" class="menu-link" target="_blank">
                <i class='menu-icon tf-icons bx bx-globe'></i>
                <div data-i18n="Analytics">Site</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Utilizadores</span>
        </li>

        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account Settings">Usuários</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.user.create') }}" class="menu-link">
                        <div data-i18n="Account">Cadastrar</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.user.index') }}" class="menu-link">
                        <div data-i18n="Notifications">Listar</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pessoas</span>
        </li>
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Authentications">Desaparecidas</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.person.index') }}" class="menu-link">
                        <div data-i18n="Basic">Listar</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Locomotivas</span>
        </li>
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-car"></i>
                <i class="menu-icon tf-icons bx bx-cycling"></i>
                <div data-i18n="Authentications">Desaparecidas</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.vehicle.index') }}" class="menu-link">
                        <div data-i18n="Basic">Listar</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Gestão de Anúncio</span>
        </li>
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Authentications">Cliente</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.custom.create') }}" class="menu-link">
                        <div data-i18n="Basic">Cadastrar</div>
                    </a>
                    <a href="{{ route('admin.custom.index') }}" class="menu-link">
                        <div data-i18n="Basic">Listar</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>