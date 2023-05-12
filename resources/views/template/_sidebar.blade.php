<nav id="sidebar" class="sidebar-wrapper d-none">
    <div style="height: 4.2em;"></div>
    <ul class="list-unstyled sidebar-menu">
        @if(Auth::guest())
        @else
        <li class="menu-label bg-light" style="border-radius: .5em .5em 0 0">
            <div class="text-center border-bottom">
                <img src="{{ Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/default/user.jpg') }}" alt="user" class="rounded-circle mb-3" width="100">
            </div>
        </li>
        <li class="menu-label sidebar-dropdown bg-light" style="border-radius: 0 0 .5em .5em">
            <a href="#"> <span class="text-capitalize">{{ Auth::user()->nama_user }}</span><br><span class="font-weight-normal text-capitalize">Selamat Datang</span> <i class="drop-icon" data-feather="chevron-right" style="margin-top: .75em;"></i></a>
            <div class="sidebar-submenu">
                <ul>
                  <li class="menu-link"><a href="{{Auth::user()->is_admin==1? '/admin' : '/member'}}">Dashborad</a></li>
                  <li class="menu-link"><a href="{{Auth::user()->is_admin==1? '/admin/profil' : '/member/profil'}}">Profil</a></li>
                  @if(Auth::user()->is_admin==0)
                  <li class="menu-link"><a href="/member/afiliasi/cara-jualan">Afiliasi</a></li>
                  @endif
                  <li class="menu-link"><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Keluar</a></li>
                    <form id="form-logout" method="post" action="{{Auth::user()->is_admin==1? '/admin/logout' : '/member/logout'}}">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </li>
        @endif
        <li class="menu-label"> <a href="/">Beranda</a> </li>
        <li class="menu-label sidebar-dropdown"> <a href="#"> <span>Program</span> <i class="drop-icon" data-feather="chevron-right"></i> </a>
            <div class="sidebar-submenu">
                <ul>
                    <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#online-class' : '/kategori/e-learning' }}">E-Learning</a> </li>
                    <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#online-course' : '/kategori/online-course' }}">Online Course</a> </li>
                    <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#workshop' : '/kategori/workshop' }}">Workshop</a> </li>
                    <li class="menu-link"> <a href="{{ Request::path() == '/' ? '#sertifikasi' : '/kategori/sertifikasi' }}">Sertifikasi</a> </li>
                    <li class="menu-link"> <a href="/kategori/seleksi-rekruitmen">Seleksi & Rekruitmen</a> </li>
                    <li class="menu-link"> <a href="/kategori/pelatihan-pendampingan">Pelatihan & Pendampingan</a> </li>
                    <li class="menu-link"> <a href="/kategori/konseling-psikoterapi">Konseling & Psikoterapi</a> </li>
                </ul>
            </div>
        </li>
        <li class="menu-label"> <a href="https://karir.psikologanda.com" target="_blank">HRD</a> </li>
        <li class="menu-label"> <a href="/psikolog">Psikolog</a> </li>
        <li class="menu-label"> <a href="{{ Request::path() == '/' ? '#career' : '/karir' }}">Karir</a> </li>
        <li class="menu-label"> <a href="https://tes.psikologanda.com" target="_blank">Tes Online</a> </li>
        @if(Auth::guest())
        <li class="menu-label"> <a href="/login">Masuk</a> </li>
        <li class="menu-label"> <a href="/register">Daftar</a> </li>
        @endif
    </ul>
</nav>