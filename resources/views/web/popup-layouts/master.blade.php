@php($site_info = DB::table('site_configs')->first())

<html lang="vi" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
    <title>@yield('title')</title>
    <meta name="author" content="{{ $site_info->site_name }}">
    <meta name="copyright" content="{{ $site_info->site_name }} [{{ $site_info->site_email }}]">
    <meta name="robots" content="noindex, follow">
    <meta name="googlebot" content="noindex, follow">
    <meta name="msnbot" content="noindex, follow">
    <meta name="generator" content="NukeViet v4.4">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $site_info->site_name }}">
    @stack('meta')

    <link rel="shortcut icon" href="{{ asset('doanluatsudanang/icon/favicon.ico') }}">
    <link rel="canonical" href="@yield('url')">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/jquery/jquery.min.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/language/vi.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/DOMPurify/purify.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/global.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/site.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/default/js/news.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/main.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/custom.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/bootstrap.non-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/style.non-responsive.css') }}">
    <link rel="StyleSheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/custom.css') }}">

    @stack('styles')
</head>
<body>
    @yield('contents')

    <script src="{{ asset('doanluatsudanang/assets/js/jquery/jquery.min.js') }}"></script>
    <script>
        var nv_base_siteurl="/",
            nv_lang_data="vi",
            nv_lang_interface="vi",
            nv_name_variable="nv",
            nv_fc_variable="op",
            nv_lang_variable="language",
            nv_module_name="news",
            nv_func_name="print",
            nv_is_user=0, 
            nv_my_ofs=7,
            nv_my_abbr="+07",
            nv_cookie_prefix="nv4",
            nv_check_pass_mstime=1738000,
            nv_area_admin=0,
            nv_safemode=0,
            theme_responsive=0,
            nv_is_recaptcha=0,
            XSSsanitize=1;
    </script>
    <script src="{{ asset('doanluatsudanang/assets/js/language/vi.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/assets/js/DOMPurify/purify.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/assets/js/global.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/assets/js/site.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/themes/default/js/news.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/main.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/custom.js') }}"></script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "http://doanluatsudanang.vn",
        "logo": "http://doanluatsudanang.vn/uploads/banner-dn.jpg"
    }
    </script>
    <script src="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/bootstrap.min.js') }}"></script>
    
    @stack('scripts')
</body>
</html>