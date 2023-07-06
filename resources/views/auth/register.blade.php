@extends('template.main')

@section('title', 'Registrasi')

@section('content')

<section class="my-lg-4 my-3">
  <div class="container">
    <div class="row justify-content-between">
		<div class="col-lg-5 d-none d-lg-block">
			<div class="sticky-top" style="top:4.8rem">
				<img class="img-fluid" src="{{asset('assets/images/ilustrasi/undraw_Login_re_4vu2.svg')}}">
			</div>
		</div>
      <div class="col-lg-6">
        <div class="info-text">
          	<!--<h4 class="mb-4">Registrasi</h4>-->
			<div class="card rounded-1 shadow-sm border-0">
				<div class="card-header mx-4 bg-transparent text-center py-4 px-0">
                    <img width="200" class="mb-3" src="{{ asset('assets/images/logo/logo_2.png')}}">
					<h2 class="mb-0">Selamat Datang</h2>
					<p>Untuk dapat menikmati layanan kami<br>Silahkan melakukan pendaftaran dengan mengisi form registrasi di bawah ini 🔔</p>
				</div>
				<div class="card-body">
					<div class="text-center mb-3">
                    	<a href="{{ asset('assets/docs/Tutorial_Pendaftaran_Personality_Talk.pdf') }}" target="_blank" class="btn btn-primary d-grid"><i class="bi bi-download me-2"></i>Download Tutorial Pendaftaran Member {{ setting('site.name') }}</a>
                    </div>
					<form method="post" action="{{ route('auth.postregister') }}">
						{{ csrf_field() }}
						<input type="hidden" name="ref" value="{{ $_GET['ref'] }}">
						<input type="hidden" name="user_kategori" value="0">

						<div class="alert alert-success text-center m-0 mb-3">
							<strong>Biaya Aktivasi:</strong><br>
							<del>Rp. {{ number_format(setting('site.harga_dicoret'),0,'.','.') }}</del><br>
							<h5>Rp {{ number_format(setting('site.biaya_aktivasi'),0,'.','.') }}</h5>
						</div>

						<div class="alert alert-warning text-center m-0 mb-3">
							<strong>Sponsor:</strong> {{ sponsor($_GET['ref']) }}
						</div>

						<p class="h6 text-center font-weight-bold mb-3 mt-5">Identitas Pendaftar</p>

						<div class="form-group mb-3">
							<label>Nama Lengkap <span class="text-danger">*</span></label>
							<div>
							  	<input type="text" name="nama_lengkap" class="form-control {{ $errors->has('nama_lengkap') ? 'border-danger' : '' }}" value="{{ old('nama_lengkap') }}">
								@if($errors->has('nama_lengkap'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('nama_lengkap')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group mb-3">
							<label>Tanggal Lahir <span class="text-danger">*</span></label>
							<div>
							  	<input type="text" name="tanggal_lahir" class="form-control {{ $errors->has('tanggal_lahir') ? 'border-danger' : '' }}" value="{{ old('tanggal_lahir') }}" placeholder="Contoh: 21/04/1997">
								@if($errors->has('tanggal_lahir'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('tanggal_lahir')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group mb-3">
							<label>Jenis Kelamin <span class="text-danger">*</span></label>
						  	<div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-1" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
								  <label class="form-check-label" for="gender-1">
									Laki-Laki
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-2" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
								  <label class="form-check-label" for="gender-2">
									Perempuan
								  </label>
								</div>
								@if($errors->has('jenis_kelamin'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('jenis_kelamin')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group mb-3">
							<label>Nomor HP <span class="text-danger">*</span></label>
						  	<div>
							  	<input type="text" name="nomor_hp" class="form-control {{ $errors->has('nomor_hp') ? 'border-danger' : '' }}" value="{{ old('nomor_hp') }}">
								@if($errors->has('nomor_hp'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('nomor_hp')) }}</div>
								@endif
							</div>
						</div>

					  	<p class="h6 text-center font-weight-bold mb-3 mt-5">Akun Pendaftar</p>

						<div class="form-group mb-3">
							<label>Email <span class="text-danger">*</span></label>
						  	<div>
							  	<input type="email" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ old('email') }}">
								@if($errors->has('email'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('email')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group mb-3">
							<label>Username <span class="text-danger">*</span></label>
						  	<div>
							  	<input type="text" name="username" class="form-control {{ $errors->has('username') ? 'border-danger' : '' }}" value="{{ old('username') }}">
								@if($errors->has('username'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('username')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group mb-3">
						  	<label>Password <span class="text-danger">*</span></label>
						  	<div>
                                <div class="input-group">
								  	<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}">
									<a href="#" class="input-group-text btn btn-light btn-toggle-password border {{ $errors->has('password') ? 'border-danger' : '' }}"><i class="bi bi-eye-fill"></i></a>
                                </div>
								@if($errors->has('password'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('password')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group mb-3">
						  	<label>Ulangi Password <span class="text-danger">*</span></label>
						  	<div>
                                <div class="input-group">
							  		<input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}">
									<a href="#" class="input-group-text btn btn-light btn-toggle-password border {{ $errors->has('password') ? 'border-danger' : '' }}"><i class="bi bi-eye-fill"></i></a>
                                </div>
						  	</div>
						</div>
						<div class="form-group mb-3">
							<div<div>
								<button type="submit" class="btn btn-primary"><i class="bi bi-check mr-1"></i> Daftar</button>
							</div>
						</div>
					  </div>
					</form>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('js-extra')

<script src="{{ asset('templates/vali-admin/js/plugins/bootstrap-datepicker.min.js') }}"></script>
<script>
	// Datepicker
	$(document).ready(function(){
		$("input[name=tanggal_lahir]").datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
			todayHighlight: true,
			toggleActive: true,
		});
	});
</script>
<script type="text/javascript">
$(document).on("click", ".btn-toggle-password", function(e){
    e.preventDefault();
    if(!$(this).hasClass("show")){
        $(this).parents(".input-group").find("input").attr("type","text");
        $(this).find(".bi").removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
        $(this).addClass("show");
    }
    else{
        $(this).parents(".input-group").find("input").attr("type","password");
        $(this).find(".bi").removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
        $(this).removeClass("show");
    }
});
</script>
@endsection

@section('css-extra')
<style type="text/css">
  body{background-color: var(--bs-light)}
  form .h6:before, form .h6:after {content: '---';}
  label {font-size: .875rem;}
</style>
@endsection
