@extends('template.main')

@section('title', 'Psikolog | ')

@section('content')

<section id="breadcrumb-container">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-3">
				<li class="breadcrumb-item"><a href="{{ route('site.home') }}" class="link-primary"><i class="bi bi-house-fill"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">Psikolog</li>
			</ol>
		</nav>
	</div>
</section>
<section class="container position-relative">
	<div class="rounded-2 bg-white p-3 shadow-sm">
		<div class="d-flex align-items-center justify-content-between">
			<div>
				<h1 class="m-0">Psikolog</h1>
				<p class="m-0">Psikolog dari {{ setting('site.name') }}.</p>
			</div>
			<img style="width: 50px!important; transform: scaleX(-1);" src="{{('assets/images/category/book.svg')}}">
		</div>
	</div>
</section>
<section class="mt-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="info-text">
			<div class="row">
				@if(count($psikolog)>0)
					@foreach($psikolog as $data)
					<div class="col-lg-3 col-md-6 mb-3">
						<div class="card border-0 shadow-sm rounded-2">
							<div class="card-header bg-transparent d-flex align-items-center">
								<div class="rounded-circle flex-shrink-0 me-3 text-center text-white" style="background-color: var(--color-{{ $data->kategori_psikolog }}); width: 70px; height: 70px">
									<h1 style="margin-top: .25em">{{ ucfirst(substr($data->nama_psikolog,0,1)) }}</h1>
								</div>
								<div>
									<h5>{{ $data->nama_psikolog }}</h5>
									<span class="badge text-white p-2" style="background-color: var(--color-{{ $data->kategori_psikolog }})">{{ psikolog($data->kategori_psikolog) }}</span>
								</div>
							</div>
							<div class="card-body">
								<p><i class="bi bi-upc-scan" style="position: absolute; margin-top: 2px"></i> <span class="ms-4">{{ $data->kode_psikolog }}</span></p>
								<p><i class="bi bi-house-door" style="position: absolute; margin-top: 2px"></i> <span class="ms-4">{{ $data->alamat_psikolog }}</span></p>
								<p><i class="bi bi-whatsapp" style="position: absolute; margin-top: 2px"></i> <a class="ms-4 link-primary" href="https://wa.me/{{ $data->nomor_telepon_psikolog }}?text=Hai%20Saya%20tertarik%20dengan%20PersonalityTalk" target="_blank">Hubungi Saya</a></p>
								<p><i class="bi bi-instagram" style="position: absolute; margin-top: 2px"></i> <a class="ms-4 link-primary" href="https://instagram.com/{{ $data->instagram_psikolog }}" target="_blank">{{ $data->instagram_psikolog }}</a></p>
							</div>
						</div>
					</div>
					@endforeach
				@else
					<div class="alert alert-danger text-center">Tidak ada data psikolog.</div>
				@endif
			</div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
