@extends('template.main')

@section('title', 'Karir | ')

@section('content')

<section id="breadcrumb-container">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-3">
				<li class="breadcrumb-item"><a href="{{ route('site.home') }}" class="link-primary"><i class="bi bi-house-fill"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">Karir</li>
			</ol>
		</nav>
	</div>
</section>
<section class="container position-relative">
	<div class="rounded-2 bg-white p-3 shadow-sm">
		<div class="d-flex align-items-center justify-content-between">
			<div>
				<h1 class="m-0">Karir</h1>
				<p class="m-0">Temukan karir kamu dari mitra {{ setting('site.name') }}.</p>
			</div>
			<img style="width: 50px!important; transform: scaleX(-1);" src="{{('assets/images/category/book.svg')}}">
		</div>
	</div>
</section>
<section class="mt-3">
  <div class="container">
    <div class="info-text">
		<div class="row psikologanda-karir">
			@if(count($karir)>0)
				@foreach($karir as $data)
					<div class="col-lg-3 col-md-6 mb-3">
						<div class="card border-0 shadow-sm rounded-2">
							<a href="{{ route('site.karir.detail', ['permalink' => $data->karir_permalink]) }}">
								<img class="card-img-top" src="{{ image('assets/images/karir/'.$data->karir_gambar, 'karir') }}" alt="Sampul Program">
							</a>
						<div class="card-body">
							<a class="link-primary" href="{{ route('site.karir.detail', ['permalink' => $data->karir_permalink]) }}"><h5 class="card-title">{{ $data->karir_title }}</h5></a>
								<p class="card-text">{!! substr(strip_tags(html_entity_decode($data->konten)),0,100) !!}... <a class="link-primary fw-bold" href="{{ route('site.karir.detail', ['permalink' => $data->karir_permalink]) }}">Selengkapnya <i class="bi bi-arrow-right"></i></a></p>	
							</div>
						</div>
					</div>
				@endforeach
				@else
				<div class="col-12">
					<div class="alert alert-danger text-center">Belum ada {{ $kategori }} tersedia.</div>
				</div>
			@endif
		</div>
    </div>
  </div>
</section>

@endsection

@section('js-extra')
<script>
	$.ajax({
		type: "get",
		url: "https://karir.psikologanda.com/api/vacancy?status=active",
		success: function(response) {
			var html = '';
			for(var i=0; i<response.length; i++) {
				html += '<div class="col-lg-3 col-md-6 mb-3">';
				html += '<div class="card h-100 border-0 shadow-sm rounded-2">';
				html += '<a href="/karir/' + response[i].url + '">';
				html += '<img class="card-img-top" src="' + response[i].image + '" alt="Gambar">';
				html += '</a>';
				html += '<div class="card-body">';
				html += '<a class="link-primary" href="/karir/' + response[i].url + '"><h5 class="card-title">' + response[i].title + '</h5></a>';
				html += response[i].status == 1 ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';
				html += '<p class="card-text">' + response[i].excerpt + ' <a class="link-primary fw-bold" href="/karir/' + response[i].url + '">Selengkapnya <i class="bi bi-arrow-right"></i></a></p>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
			}
			$(".psikologanda-karir").html(html);
		}
	})
</script>
@endsection