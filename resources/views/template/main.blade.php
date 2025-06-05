<!DOCTYPE html>
<html lang="en">
<head>
	@include('template._head')
	@yield('css-extra')
</head>
<body id="spandiv">
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M4QR28H" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	{{-- <div id="content"> --}}
	@include('template._header')
	@yield('content')
	{{-- </div> --}}
	@include('template._footer')
    <div class="main-overlay"></div>
	@include('template._js')
	@yield('js-extra')
</body>
</html>