<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
			<a class="navbar-brand mb-0" href="{{ route('site.home') }}"><img src="{{ asset('assets/images/logo/'.setting('site.logo')) }}" alt="Logo PersonalityTalk"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<div class="header-right ms-auto">
					<ul class="navbar-nav align-items-lg-center n-log">
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1" href="https://psikologanda.com/" target="_blank">Beranda</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1" href="https://psikologanda.com/tentang-kami/" target="_blank">Tentang Kami</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1" href="https://psikologanda.com/layanan/" target="_blank">Layanan</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1" href="https://psikologanda.com/psikolog/" target="_blank">Psikolog</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1" href="https://psikologanda.com/#" target="_blank">Artikel</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1" href="https://belajar.psikologanda.com/" target="_blank">Belajar</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1 {{ strpos(Request::url(), '/karir') ? 'active' : '' }}" href="{{ route('site.karir.index') }}">Karir</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="nav-link px-1" href="https://karir.psikologanda.com/login" target="_blank">BK / HRD</a> </li>
						<li style="margin-left: 5px" class="nav-item"> <a class="btn btn-outline-primary ms-0 ms-lg-2 px-3 mb-2 mb-lg-0 d-grid" href="https://tes.psikologanda.com/login" target="_blank">Tes&nbsp;Online</a></li>
						@if(Auth::guest())
						<li class="nav-item"> <a class="btn btn-primary ms-0 ms-lg-2 px-3 mb-2 mb-lg-0 d-grid" href="{{ route('auth.login', ['ref' => $_GET['ref']]) }}">Masuk</a> </li>
						<li class="nav-item"> <a class="btn btn-secondary ms-0 ms-lg-2 px-3 mb-2 mb-lg-0 d-grid" href="{{ route('auth.register', ['ref' => $_GET['ref']]) }}">Daftar</a> </li>
						@else
						<li class="nav-item dropdown">
							<a class="nav-link account dropdown-toggle d-flex align-items-center" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							  <img src="{{ image('assets/images/users/'.Auth::user()->foto, 'user') }}" alt="user" class="rounded-circle" width="31">
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
							  <li><span class="dropdown-header">
							  	{{ Auth::user()->nama_user }}<br>
							  	<span class="font-weight-normal">Selamat Datang</span>
							  </span></li>
							  <li><hr class="dropdown-divider"></li>
							  <li><a class="dropdown-item" href="{{Auth::user()->is_admin==1? '/admin' : '/member'}}">Dashboard</a></li>
							  <li><a class="dropdown-item" href="{{Auth::user()->is_admin==1? '/admin/profil' : '/member/profil'}}">Profil</a></li>
							  @if(Auth::user()->is_admin==0)
							  <li><a class="dropdown-item" href="/member/afiliasi/cara-jualan">Afiliasi</a></li>
							  @endif
							  <li><a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Keluar</a></li>
								<form id="form-logout" method="post" action="{{Auth::user()->is_admin==1? '/admin/logout' : '/member/logout'}}">
							        {{ csrf_field() }}
							    </form>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>