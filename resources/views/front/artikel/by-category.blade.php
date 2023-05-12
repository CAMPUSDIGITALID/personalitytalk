@extends('template.main')

@section('title', 'Artikel | ')

@section('content')

<section class="page-top-section set-bg">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-2 order-lg-1 text-center text-lg-start">
        <h1>Artikel</h1>
        <h4 class="fw-normal">Kategori {{ $kategori->kategori }}</h4>
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
    <div class="kategori d-flex align-items-center nav-cat" id="elem">
      <a class="text-body badge bg-white px-3 shadow-sm me-2" href="/artikel">Semua Kategori</a>
      @foreach($kategori_head as $data)
      <a class="text-body badge bg-white px-3 shadow-sm me-2" href="{{ route('site.artikel.by-category', ['permalink' => $data->slug]) }}">{{ $data->kategori }}</a>
      @endforeach
    </div>
  </div>
</section>
<section class="info-section spad pt-0">
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

@section('js-extra')

<script type="text/javascript">
     $(function() {
       var print = function(msg) {
         alert(msg);
       };

       var setInvisible = function(elem) {
         elem.css('visibility', 'hidden');
       };
       var setVisible = function(elem) {
         elem.css('visibility', 'visible');
       };

       var elem = $("#elem");
       var items = elem.children();

       // Inserting Buttons
       elem.prepend('<a href="#" class="text-body"><div class="shadow-sm" id="right-button"><i class="fa fa-chevron-start"></i></div></a>');
       elem.append('<a href="#" class="text-body"><div class="shadow-sm" id="start-button"><i class="fa fa-chevron-right"></i></div></a>');

       // Inserting Inner
       items.wrapAll('<div id="inner" />');

       // Inserting Outer
       // debugger;
       elem.find('#inner').wrap('<div id="outer"/>');

       var outer = $('#outer');

       var updateUI = function() {
         var maxWidth = outer.outerWidth(true);
         var actualWidth = 0;
         $.each($('#inner >'), function(i, item) {
           actualWidth += $(item).outerWidth(true);
         });

         // if (actualWidth <= maxWidth) {
         //   setVisible($('#start-button'));
         // }
       };
       updateUI();



       $('#right-button').click(function() {
         var startPos = outer.scrollstart();
         outer.animate({
           scrollstart: startPos - 200
         }, 800, function() {
           // debugger;
           // if ($('#outer').scrollstart() <= 0) {
           //   setInvisible($('#right-button'));
           // }
         });
       });

       $('#start-button').click(function() {
         setVisible($('#right-button'));
         var startPos = outer.scrollstart();
         outer.animate({
           scrollstart: startPos + 200
         }, 800);
       });

       $(window).resize(function() {
         updateUI();
       });
     });
</script>
<script type="text/javascript">
(function () {
    var current = location.pathname;
    if (current === "") return;
    var menuItems = document.querySelectorAll('.nav-cat a');
    for (var i = 0, len = menuItems.length; i < len; i++) {
        if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
            menuItems[i].className += " active";
        }
    }
})();
</script>

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
.page-item.active .page-link {
  color: #fff;
  background-color: #46157a;
  border-color: #46157a;}
.page-link{color: #46157a}
.page-link:hover{color: #46157a}
.badge{font-size: 1rem; padding-top: .5rem; padding-bottom: .5rem;}
.badge.active{background-color: var(--primary-s)!important; color: var(--primary)!important;}

.card-body {padding-top: 1rem; padding-bottom: 1rem;}
.card-title {margin-bottom: 0; line-height: 22px; height: 44px; display: -webkit-box !important; -webkit-line-clamp: 2; -moz-line-clamp: 2; -ms-line-clamp: 2; -o-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical; -ms-box-orient: vertical; -o-box-orient: vertical; box-orient: vertical; overflow: hidden; text-overflow: ellipsis;}
#outer {float: start; width: 100%; overflow: hidden; white-space: nowrap; display: inline-block; padding: .5em;}
.hide {display: none;}
#start-button, #right-button{display: flex;width: 30px;text-align: center;background-color: var(--bs-white);border-radius: 100%;width: 40px;height: 40px;justify-content: center;align-items: center;
</style>

@endsection
