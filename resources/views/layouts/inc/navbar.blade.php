<nav class="navbar navbar-expand-md text-body navbar-primary bg-white">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('storage/images/sifiks4.png') }}" alt="sifiks4" width="125" class="d-inline-block align-top" border="0">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle Navbar">
        <i class="fas fa-ellipsis-h fa-lg" style="color:#3588cd;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Info Kesehatan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('list.articles', ['category' => 'penyakit']) }}">Penyakit</a>
                    <a class="dropdown-item" href="{{ route('list.articles', ['category' => 'obat']) }}">Obat - obatan</a>
                    <a class="dropdown-item" href="{{ route('list.articles', ['category' => 'hidup-sehat']) }}">Hidup Sehat</a>
                    <a class="dropdown-item" href="{{ route('list.articles', ['category' => 'keluarga']) }}">Keluarga</a>
                    <a class="dropdown-item" href="{{ route('list.articles', ['category' => 'kesehatan']) }}">Kesehatan</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('search.doctor')}}">Cari Dokter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('search.index.hospital')}}">Cari Rumah Sakit</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.thread.index') }}"><strong>Tanya Dokter</strong></a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.profile', ['query' => 'all']) }}"> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
