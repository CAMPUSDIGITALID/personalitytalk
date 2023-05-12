@extends('template.main')

@section('title', 'Artikel | ')

@section('content')

<section class="page-top-section set-bg">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-2 order-lg-1 text-center text-lg-start">
        <h1>Artikel</h1>
        <h4 class="fw-normal">Oleh {{ $user->kontributor }}</h4>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 mb-3 mb-lg-0 text-center my-5">
        <img class="h-auto img-header" width="400px" src="{{asset('assets/images/ilustrasi/artikel-1.png')}}" alt="banner">
      </div>
    </div>
  </div>
</section>

<section class="info-section spad">
  <div class="container">
    <div class="row">
      @foreach($artikel as $data)
      <div class="col-lg-3 col-md-6 mb-3 d-md-flex align-baseline">
        <div class="card border-0 shadow-sm">
          <a href="{{ route('site.artikel.detail', ['permalink' => $data->blog_permalink ]) }}">
          <img class="card-img-top" src="{{ image('assets/images/blog/'.$data->blog_gambar, 'blog') }}" alt="Card image cap">
          </a>
          <div class="card-body">
             <p class="card-title fw-bold"><a class="text-body" href="{{ route('site.artikel.detail', ['permalink' => $data->blog_permalink ]) }}">{{ $data->blog_title }}</a></p>
          </div>
          <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <div>
              <p class="m-0"><small class="text-muted"><i class="fas fa-clock me-1"></i>{{ generate_time_elapsed($data->blog_at) }}</small></p>
              <p class="m-0"><small class="text-muted"><i class="fas fa-user me-1"></i><a class="text-link" href="{{ $data->blog_kontributor != 0 ? route('site.artikel.by-contributor', ['username' => $data->slug]) : route('site.artikel.by-author', ['username' => $data->username]) }}">{{ $data->blog_kontributor != '' ? $data->kontributor : $data->nama_user }}</a></small></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row mt-3" id="pagination">
      {!! $artikel->links() !!}
    </div>
  </div>
</section>

@endsection

@section('css-extra')

<style type="text/css">
.info-text {padding-top: 0;}
.info-text p {margin-bottom: 1rem!important;}
p{line-height: 1.5}
.pagination{justify-content: center; width: fit-content; margin-left: auto; margin-right: auto;}

.ql-align-start {text-align: start!important;}
.ql-align-right {text-align: right!important;}
.ql-align-center {text-align: center!important;}
.ql-align-justify {text-align: justify!important;}
</style>

@endsection
