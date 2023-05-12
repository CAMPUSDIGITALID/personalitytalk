@extends('template.main')

@section('title', $halaman->halaman_title.' | ')

@section('content')

<section id="breadcrumb-container">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('site.home') }}"><i data-feather="home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ $halaman->halaman_title }}</li>
			</ol>
		</nav>
	</div>
</section>
<section>
	<div class="bg-theme-2">
		<div class="container pt-0 pt-md-4 pb-4 mb-4 mb-lg-0">
		  <div class="row">
		    <div class="col-lg-8 order-2 order-lg-1 text-white">
		      <h2 class="mb-3">{{ $halaman->halaman_title }}</h2>
		    </div>
		  </div>
		</div>
	</div>
</section>
<section class="my-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-light rounded-2 border-0 shadow-sm px-3">
          <div class="row ql-snow">
            <div class="ql-editor">{!! html_entity_decode($halaman->konten) !!}</div>
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
  .ql-editor h2 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor ol {padding-left: 30px!important;}
  .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
  .card-img-top{border-radius: 0}
  @media (min-width: 768px) {
    .card-img-top{border-radius: 1em}
  }
  @media (min-width: 992px) {
    .card-img-top{border-radius: 1em 1em 0 0}
  }
</style>

@endsection