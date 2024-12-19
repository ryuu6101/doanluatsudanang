<div class="section-nav">
    <div class="wraper">
        <nav class="second-nav" id="menusite">
            <div class="container">
                <div class="row">
                    <div class="bg box-shadow">
                        <div class="navbar navbar-default navbar-static-top" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-site-default">
                                    <span class="sr-only">&nbsp;</span> <span class="icon-bar">&nbsp;</span> <span class="icon-bar">&nbsp;</span> <span class="icon-bar">&nbsp;</span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="menu-site-default">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a class="home" title="Trang nhất" href="{{ route('home.index') }}">
                                            <em class="fa fa-lg fa-home">&nbsp;</em>
                                            <span class="visible-xs-inline-block"> Trang nhất</span>
                                        </a>
                                    </li>
                                    <li class="gioi-thieu" role="presentation">
                                        <a class="dropdown-toggle" href="{{ route('about.index') }}" role="button" 
                                        aria-expanded="false" title="GIỚI THIỆU">  
                                            GIỚI THIỆU
                                        </a> 
                                    </li>
                                    <li class="tin-tuc" role="presentation">
                                        <a class="dropdown-toggle" href="{{ route('home.index') }}" role="button" 
                                        aria-expanded="false" title="TIN TỨC">  
                                            TIN TỨC
                                        </a> 
                                    </li>
                                    <li class="thong-bao-thong-tin" role="presentation">
                                        <a class="dropdown-toggle" href="#!" role="button" aria-expanded="false" title="THÔNG BÁO - THÔNG TIN">  
                                            THÔNG BÁO - THÔNG TIN
                                        </a> 
                                    </li>
                                    <li class="" role="presentation">
                                        <a class="dropdown-toggle" href="https://www.liendoanluatsu.org.vn/" role="button" 
                                        aria-expanded="false" title="LIÊN ĐOÀN LUẬT SƯ VIỆT NAM" onclick="this.target='_blank'">  
                                            LIÊN ĐOÀN LUẬT SƯ VIỆT NAM
                                        </a> 
                                    </li>
                                    <li class="lien-he" role="presentation">
                                        <a class="dropdown-toggle" href="#!" role="button" aria-expanded="false" title="LIÊN HỆ">  
                                            LIÊN HỆ
                                        </a> 
                                    </li>
                                    <li class="quan-ly-luat-su" role="presentation">
                                        <a class="dropdown-toggle" href="{{ route('organs.index') }}" role="button" 
                                        aria-expanded="false" title="QUẢN LÝ LUẬT SƯ">  
                                            QUẢN LÝ LUẬT SƯ
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        let navbar = {{ Js::from($menu['navbar'] ?? '') }};
        if (navbar != '') $('#menu-site-default .'+navbar).addClass('active');
    })
</script>
@endpush