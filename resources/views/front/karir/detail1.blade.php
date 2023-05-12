@extends('template.main')

@section('content')

<section id="breadcrumb-container">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-3">
				<li class="breadcrumb-item"><a href="{{ route('site.home') }}" class="link-primary"><i class="bi bi-house-fill"></i></a></li>
				<li class="breadcrumb-item"><a href="{{ route('site.karir.index') }}" class="link-primary">Karir</a></li>
				<li class="breadcrumb-item active" aria-current="page" data-pt="title"></li>
			</ol>
		</nav>
	</div>
</section>
<section>
	<div class="bg-secondary">
		<div class="container pt-0 pt-md-4 pb-4 mb-4 mb-lg-0">
		  <div class="row">
		    <div class="col-lg-8 order-2 order-lg-1 text-white">
		      <span class="badge bg-primary mb-3 p-2">Karir</span>
		      <h2 class="mb-3" data-pt="title"></h2>
		      <p class="m-0">Oleh : <span data-pt="author"></span><br> Terakhir diperbarui pada <span data-pt="date"></span></p>
		      <a class="btn btn-primary mt-3 rounded d-block d-lg-none" data-pt="url" href="" target="_blank">Daftar Karir</a>
		    </div>
		    <div class="col-lg-4 order-1 order-lg-2 stick sticky-top px-0 px-md-3" style="height:1px">
		      <div class="sticky-sidebar">
		        <div class="card rounded-2 border-0 shadow-sm mb-3 mb-lg-0">
		          <img class="card-img-top" data-pt="image" src="">
		          <div class="card-body d-none d-lg-block">		          	
		            <span class="badge bg-primary mb-2 p-2 text-white">Karir</span>
		            <h5 class="mb-3" data-pt="title"></h5>
					<p class="mb-1" data-pt="status"></p>
		            <p class="m-0">Oleh : <span data-pt="author"></span><br> Terakhir diperbarui pada <span data-pt="date"></span></p>
		            <a class="btn btn-primary mt-3 rounded" data-pt="url" href="" target="_blank">Daftar Karir</a>
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
          <h5 class="font-weight-bold">Ringkasan</h5>
        </div>
        <div class="card bg-light rounded-2 border-0 shadow-sm px-3">
          <div class="row ql-snow">
            <div class="ql-editor" data-pt="description"></div>
          </div>
        </div>
      </div>
  </div>
</section>

@endsection

@section('js-extra')
<script>
	$.ajax({
		type: "get",
		url: "https://karir.psikologanda.com/api/vacancy/{{ $permalink }}",
		success: function(response) {
			$("[data-pt=title]").text(response.title);
			$("[data-pt=description]").html(response.description);
			$("[data-pt=image]").attr("src",response.image);
			$("[data-pt=url]").attr("href","https://karir.psikologanda.com/lowongan/" + response.url);
			$("[data-pt=author]").text(response.author);
			$("[data-pt=date]").text(response.date);
			$("[data-pt=status]").html(response.status == 1 ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>');
		},
		error: function(response) {
			alert("Karir tidak ditemukan!");
			window.location.href = "{{ route('site.karir.index') }}";
		}
	})
</script>
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