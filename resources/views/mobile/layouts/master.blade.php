<html lang="vi" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
    <title>@yield('title')</title>
    @php($site_info = DB::table('site_configs')->first())
    <meta name="author" content="{{ $site_info->site_name }}">
    <meta name="copyright" content="{{ $site_info->site_name }} [{{ $site_info->site_email }}]">
    <meta name="generator" content="NukeViet v4.4">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:site_name" content="{{ $site_info->site_name }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @stack('meta')

    <link rel="shortcut icon" href="{{ asset('doanluatsudanang/icon/favicon.ico') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/jquery/jquery.min.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/language/vi.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/DOMPurify/purify.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/global.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/site.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/default/js/page.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/mobile_default/js/main.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/jquery/jquery.metisMenu.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/jquery-ui/jquery-ui.min.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/language/jquery.ui.datepicker-vi.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/default/js/users.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/mobile_default/js/bootstrap.min.js') }}">
    <link rel="StyleSheet" href="{{ asset('doanluatsudanang/assets/css/font-awesome.min.css') }}">
    <link rel="StyleSheet" href="{{ asset('doanluatsudanang/themes/mobile_default/css/bootstrap.min.css') }}">
    <link rel="StyleSheet" href="{{ asset('doanluatsudanang/themes/mobile_default/css/style.css') }}">
    <link rel="StyleSheet" href="{{ asset('doanluatsudanang/themes/mobile_default/css/users.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/mobile_default/css/jquery.metisMenu.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/assets/js/jquery-ui/jquery-ui.min.css') }}" type="text/css">
    @stack('styles')
</head>
<body>
    <div id="mobilePage">
        @include('mobile.layouts.header')

        <div class="wrap">
            <section>
                <div id="body">
                    @include('mobile.layouts.breadcrumb')

                    <div class="row">
                        @yield('contents')
                    </div>
                </div>
            </section>
            <nav class="footerNav2">
            </nav>
            
            @include('mobile.layouts.footer')
        </div>
    </div>

    @include('mobile.layouts.help-window')

    @include('mobile.layouts.menu-modals')
    
    <script src="{{ asset('doanluatsudanang/assets/js/jquery/jquery.min.js') }}"></script>
    <script>
        var nv_base_siteurl="/",
            nv_lang_data="vi",
            nv_lang_interface="vi",
            nv_name_variable="nv",
            nv_fc_variable="op",
            nv_lang_variable="language",
            nv_module_name="about",
            nv_func_name="main",
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
    <script src="{{ asset('doanluatsudanang/themes/default/js/page.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/themes/mobile_default/js/main.js') }}"></script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "http://doanluatsudanang.vn",
        "logo": "http://doanluatsudanang.vn/uploads/banner-dn.jpg"
    }
    </script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/assets/js/jquery/jquery.metisMenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/assets/js/language/jquery.ui.datepicker-vi.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/themes/default/js/users.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="modal30"]').click(function() {
            $('#company-map-modal-30').modal("show");
        });
    });
    </script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/themes/mobile_default/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/themes/mobile_default/js/contact.js') }}"></script>

    @stack('scripts')
</body>
</html>