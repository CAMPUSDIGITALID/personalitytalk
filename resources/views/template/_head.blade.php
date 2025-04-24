	<title>@yield('title')</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="robots" content="index, follow"/>
	<meta name="revisit-after" content="1 days"/>
	<meta name="title" content="{{ setting('site.name') }}"/>
	<meta name="description" content="@yield('description')"/>
	<meta name="keywords" content="@yield('keywords')"/>
	<meta name="author" content="{{ setting('site.name') }}"/>
	<meta itemProp="name" content="{{ setting('site.name') }}"/>
	<meta itemprop="url" content="{{ URL::to('/') }}" />
	<meta itemProp="description" content="{{ setting('site.name') }}"/>
	<meta itemProp="image" content="{{ asset('assets/images/logo/'.setting('site.icon')) }}"/>
	<meta property="og:site_name" content="{{ setting('site.name') }}" />
	<meta property="og:keywords" content="{{ setting('site.keywords') }}" />
	<meta property="og:title" content="{{ setting('site.name') }}" />
	<meta property="og:description" content="{{ setting('site.description') }}"/>
	<meta property="og:type" content="website" />
	<meta property="og:image" content="{{ asset('assets/images/logo/'.setting('site.icon')) }}" />
	<meta property="og:url" content="{{ URL::to('/') }}" />
	<meta name="twitter:card" content="photo" />
	<meta name="twitter:title" content="{{ setting('site.name') }}" />
	<meta name="twitter:description" content="{{ setting('site.name') }}" />
	<meta name="twitter:image" content="{{ asset('assets/images/logo/'.setting('site.icon')) }}" />
	<meta name="twitter:domain" content="{{ URL::to('/') }}"/>
	<link rel="canonical" href="{{ URL::to('/') }}"/>
	<link rel="image_src" href="{{ asset('assets/images/logo/'.setting('site.icon')) }}"/>
	<link rel="shortcut icon" href="{{ asset('assets/images/logo/'.setting('site.icon')) }}" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    
    <!-- Google Analytics -->
    {!! html_entity_decode(setting('site.google_analytics')) !!}
