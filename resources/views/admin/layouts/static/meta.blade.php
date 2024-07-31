<title id="pageTitle">@yield('title', setting('site_meta_title'))</title>
<meta name="description" id="pageDescription" content="@yield('description', setting('site_meta_description'))">
<link rel="canonical" href='{{env('APP_URL')}}' />
<meta name="robots" content="index, follow">
<meta property="og:title" content="{{setting('site_title')}}">
<meta property="og:description" content="{{setting('site_meta_description')}}">
<meta property="og:image" content="{{image(setting('site_color_logo'))}}">
<meta property="og:url" content="{{env('APP_URL')}}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{setting('site_title')}}">
<meta name="twitter:description" content="{{setting('site_meta_description')}}">
<meta name="twitter:image" content="{{image(setting('site_color_logo'))}}">

