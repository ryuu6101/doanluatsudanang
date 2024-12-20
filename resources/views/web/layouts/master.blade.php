<html lang="vi" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
    <title>@yield('title')</title>
    <meta name="author" content="doanluatsudanang">
    <meta name="copyright" content="doanluatsudanang [webmaster@doanluatsudanang.viettuyetsilk.com]">
    <meta name="generator" content="NukeViet v4.4">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="doanluatsudanang">
    <link rel="shortcut icon" href="{{ asset('doanluatsudanang/icon/favicon.ico') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/jquery/jquery.min.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/language/vi.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/global.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/default/js/page.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/main.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/custom.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/jquery-ui/jquery-ui.min.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/language/jquery.ui.datepicker-vi.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/default/js/users.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/assets/js/jquery/jquery.metisMenu.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/contact.js') }}">
    <link rel="preload" as="script" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/bootstrap.non-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/style.non-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/style.responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/custom.css') }}">
    <link rel="styleSheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/users.css') }}">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/assets/js/jquery-ui/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/jquery.metisMenu.css') }}">
    <link rel="styleSheet" href="{{ asset('doanluatsudanang/themes/doanluatsudanang/css/contact.css') }}">
    <link rel="styleSheet" href="{{ asset('doanluatsudanang/themes/default/css/organs.css') }}">
    @stack('styles')
</head>
<body>
    @include('web.layouts.header')

    @include('web.layouts.navbar')

    <div class="section-body">
        <div class="wraper">
            <section>
                <div class="container" id="body">
                    @include('web.layouts.search-bar')

                    <div class="row">
                        <div class="col-sm-12 col-md-13 col-sm-push-6 col-md-push-5">
                            @yield('contents')
                        </div>
                        
                        @include('web.layouts.right-panel')
                    
                        @include('web.layouts.left-panel')
                    </div>

                </div>
            </section>
        </div>
    </div>
    @include('web.layouts.footer')

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
            nv_is_recaptcha=0;
    </script>
    <script src="{{ asset('doanluatsudanang/assets/js/language/vi.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/assets/js/global.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/themes/default/js/page.js') }}"></script>
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
    <script type="text/javascript" src="{{ asset('doanluatsudanang/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/assets/js/language/jquery.ui.datepicker-vi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/themes/default/js/users.js') }}"></script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/themes/default/js/organs.js') }}"></script>
    {{-- <script type="text/javascript" data-show="after">
        $(function() {
            checkWidthMenu();
            $(window).resize(checkWidthMenu);
        });
    </script> --}}
    <script type="text/javascript">
        $(document).ready(function() {$("[data-rel='block_news_tooltip'][data-content!='']").tooltip({
            placement: "bottom",
            html: true,
            title: function(){
                return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + 
                        $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + 
                        '</p><div class="clearfix"></div>';
            }
        });});
    </script>
    <script type="text/javascript" src="{{ asset('doanluatsudanang/assets/js/jquery/jquery.metisMenu.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#menu_53').metisMenu({
                toggle: false
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#menu_54').metisMenu({
                toggle: false
            });
        });
    </script>
    <script src="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/contact.js') }}"></script>
    <script src="{{ asset('doanluatsudanang/themes/doanluatsudanang/js/bootstrap.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
