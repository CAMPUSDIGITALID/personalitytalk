@extends('template.main')

@section('title', 'Pencarian | ')

@section('content')

<section class="page-top-section set-bg">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-2 order-lg-1 text-center text-lg-start">
        <h1>Artikel</h1>
        <h4 class="fw-normal">Artikel, tips, dan checklist<br>menarik yang disiapkan bagi bisnis Anda</h4>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 mb-3 mb-lg-0 text-center my-5">
        <img class="h-auto img-header" width="400px" src="{{asset('assets/images/ilustrasi/artikel-1.png')}}" alt="banner">
      </div>
    </div>
  </div>
</section>
<section class="section-search">
  <div class="container mb-5">
    <div class="search-bar mb-3">
      <form method="get" action="/search">
        <div class="input-group">
          <input type="text" class="form-control form-control-lg border-end-0" placeholder="Pencarian" name="q" value="{{ isset($_GET) && isset($_GET['q']) ? $_GET['q'] : '' }}" required style="border-radius: .5rem 0 0 .5rem;">
          <button class="input-group-text btn btn-primary px-4" type="submit" style="border-radius: 0 .5rem .5rem 0"><i class="fas fa-search color-theme-1"></i></button>
        </div>
      </form>
    </div>
    <div class="d-flex align-items-center">
        <p>Menampilkan pencarian dengan kata kunci <strong>{{ isset($_GET) && isset($_GET['q']) ? $_GET['q'] : '' }}</strong>.</p>
    </div>
  </div>
</section>

<section class="info-section spad pt-0">
  <div class="container">
    <div class="row">
      @foreach($artikel as $data)
      <div class="col-lg-3 col-md-6 mb-4 d-md-flex align-baseline">
        <div class="card border-0 shadow-sm">
          <a href="{{ route('site.artikel.detail', ['permalink' => $data->blog_permalink ]) }}">
          <img class="card-img-top" src="{{ image('assets/images/blog/'.$data->blog_gambar, 'blog') }}" alt="Card image cap">
          </a>
          <div class="card-body">
            <p class="card-title fw-bold"><a class="text-body" href="{{ route('site.artikel.detail', ['permalink' => $data->blog_permalink ]) }}">{{ $data->blog_title }}</a></p>
          </div>
          <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <div>
              <p class="m-0"><small class="text-muted"><i class="fa fa-clock-o me-1"></i>{{ generate_time_elapsed($data->blog_at) }}</small></p>
              <p class="m-0"><small class="text-muted"><i class="fa fa-user me-1"></i><a class="text-link" href="{{ $data->blog_kontributor != 0 ? route('site.artikel.by-contributor', ['username' => $data->slug]) : route('site.artikel.by-author', ['username' => $data->username]) }}">{{ $data->blog_kontributor != '' ? $data->kontributor : $data->nama_user }}</a></small></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex mt-3 justify-content-center" id="pagination">
      {!! $artikel->appends(request()->query())->links() !!}
    </div>
  </div>
</section>

@endsection