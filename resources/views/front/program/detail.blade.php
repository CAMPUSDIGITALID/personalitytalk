@extends('template.main')

@section('title', $program->program_title.' - Program | ')

@section('content')

<section id="breadcrumb-container">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-3">
				<li class="breadcrumb-item"><a href="{{ route('site.home') }}" class="link-primary"><i class="bi bi-house-fill"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('site.program.index', ['category' => $program->slug]) }}" class="link-primary">{{ $program->kategori }}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ $program->program_title }}</li>
			</ol>
		</nav>
	</div>
</section>
<section>
	<div class="bg-secondary">
    <div class="container pt-0 pt-md-4 pb-4 mb-4 mb-lg-0">
      <div class="row">
        <div class="col-lg-8 order-2 order-lg-1 text-white">
          <span class="badge bg-primary mb-3 p-2"><a class="text-white" href="{{ route('site.program.index', ['category' => $program->slug]) }}">{{ $program->kategori }}</a></span>
          <h2 class="mb-3">{{ $program->program_title }}</h2>
          <p class="m-0">Oleh : {{ $program->nama_user }}<br> Terakhir diperbarui {{ generate_date($program->program_at) }}</p>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 stick sticky-top px-0 px-md-3" style="height:1px">
          <div class="sticky-sidebar">
            <div class="card rounded-2 border-0 shadow-sm mb-3 mb-lg-0">
              <img class="card-img-top" src="{{ image('assets/images/program/'.$program->program_gambar, 'program') }}">
              <div class="card-body d-none d-lg-block">
                <h5 class="mb-3">{{ $program->program_title }}</h5>
                <p class="m-0">Oleh : {{ $program->nama_user }}<br> Terakhir diperbarui {{ generate_date($program->program_at) }}</p>
                <span class="badge bg-primary mt-3 p-2"><a class="text-white" href="{{ route('site.program.index', ['category' => $program->slug]) }}">{{ $program->kategori }}</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
</section>
<section class="my-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="heading">
          <h5 class="fw-bold">Ringkasan</h5>
        </div>
        <div class="card rounded-2 border-0 shadow-sm">
          <div class="card-body">
            <div class="ql-snow">
              <div class="ql-editor">{!! html_entity_decode($program->konten) !!}</div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>

@endsection

@section('css-extra')

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
  /* Quill */
  .ql-editor {padding: 0}
  .ql-editor h2 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor ol {padding-left: 30px!important;}
  .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
  .ql-editor ol {margin-bottom: 1rem!important;}
  .ql-editor p {margin-bottom: 1rem!important;}
  .card-img-top{border-radius: 0}
  @media (min-width: 768px) {
    .card-img-top{border-radius: 1em}
  }
  @media (min-width: 992px) {
    .card-img-top{border-radius: 1em 1em 0 0}
  }
</style>

@endsection