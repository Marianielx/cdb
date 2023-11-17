<section id="topbar" class="topbar d-flex align-items-center bg-light">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center text-dark">
                <a href="mailto:geral@infosi.gov.ao" class="text-dark">mariano.vunge97@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4 text-dark"><span class="text-dark">(+244) 938 552
                    241</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://www.facebook.com/HCKMariano" class="facebook text-dark"><i class="bi bi-facebook"></i></a>
            <a href="https://www.linkedin.com/in/mariano-vunge-24033a23b/" class="linkedin text-dark"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section>
<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ route('site.home') }}" class="logo d-flex align-items-center">
            <!-- <img src="/site/img/mono-logo.svg" alt="logo" class="" height="28"> -->
            <h3 class="text-white">PORTAL CENTRAL DA BANDA</h3>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('site.home') }}">Home</a></li>
                @guest
                @if (Route::has('login'))
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('site.home.person') }}">Pessoa</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('site.home.vehicle') }}">Locomotiva</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">{{ __('Entrar') }}</a></li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('visitor.user.create') }}">{{ __('Registrar') }}</a></li>
                @endif
                @else
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('site.person.index') }}">Pessoa</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('site.vehicle.index') }}">Locomotiva</a></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name[0] }}
                        {{ Auth::user()->last_name[0] }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('site.person.list') }}">
                            <hr>
                            <p class="text-dark">{{ __('Minha Pessoa')}}</p>
                            <hr>
                        </a>
                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <p class="text-dark">{{ __('Terminar Sessão')}}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>