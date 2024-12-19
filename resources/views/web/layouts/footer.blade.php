@php($site_info = $site_info ?? \Illuminate\Support\Facades\DB::table('site_configs')->first())
<footer class="section-footer-top" id="footer">
    <div class="wraper">
        <div class="container">
            <div class="row">
                <div class="col-xs-24 col-sm-24 col-md-6">
                    <div class="panel-body">
                        <h3>Các chuyên mục chính</h3>
                        <section>
                            <ul class="menu">
                                <li><a href="{{ route('about.index') }}">Giới thiệu</a></li>
                                <li><a href="{{ route('home.index') }}">Tin Tức</a></li>
                                <li><a href="#!">Thành viên</a></li>
                                <li><a href="{{ route('contact.index') }}">Liên hệ</a></li>
                                <li><a href="#!">Thăm dò ý kiến</a></li>
                                <li><a href="#!">Quảng cáo</a></li>
                                <li><a href="#!">Tìm kiếm</a></li>
                                <li><a href="#!">RSS-feeds</a></li>
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-24 col-md-10">
                </div>
                <div class="col-xs-24 col-sm-24 col-md-8">
                    <div class="panel-body">
                        <h3>Đoàn luật sư Đà Nẵng</h3>
                        <section>
                            <ul class="company_info" itemscope="" itemtype="http://schema.org/LocalBusiness">
                                <li class="hide hidden">
                                    <span itemprop="image">http://doanluatsudanang.vn/uploads/banner-dn.jpg</span>
                                    <span itemprop="priceRange">N/A</span>
                                </li>
                                <li class="company_name">
                                    <span itemprop="name">{{ $site_info->company_name }}</span>
                                </li>
                                <li>
                                    <a class="pointer" data-toggle="modal" data-target="#company-map-modal-31">
                                        <em class="fa fa-map-marker"></em>
                                        <span>Địa chỉ: 
                                            <span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                                                <span itemprop="addressLocality" class="company-address">
                                                    {{ $site_info->address }}
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <em class="fa fa-phone"></em>
                                    <span>Điện thoại: <span itemprop="telephone">{{ $site_info->phone }}</span></span>
                                </li>
                                <li>
                                    <em class="fa fa-envelope"></em>
                                    <span>Email: 
                                        <a href="mailto:{{ $site_info->email }}">
                                            <span itemprop="email">{{ $site_info->email }}</span>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-24 col-sm-24 col-md-8">
                </div>
                <div class="col-xs-24 col-sm-24 col-md-16">
                    <div class="copyright">
                        <span>©&nbsp;Bản quyền thuộc về <a href="http://doanluatsudanang.vn">doanluatsudanang</a>.&nbsp; </span>
                        {{-- <span>Mã nguồn <a href="http://nukeviet.vn/" target="_blank">NukeViet CMS</a>.&nbsp; </span> --}}
                        <span>Thiết kế bởi <a href="cnpt.vn" target="_blank">CNPT</a>.&nbsp; </span>
                        <span>&nbsp;|&nbsp;&nbsp;<a href="/siteterms/">Điều khoản sử dụng</a></span>
                    </div>
                    {{-- <div id="contactButton" class="box-shadow">
                        <button type="button" class="ctb btn btn-primary btn-sm" data-module="contact">
                            <em class="fa fa-pencil-square-o"></em>
                            Gửi phản hồi
                        </button>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <button type="button" class="close">×</button>
                                Gửi phản hồi
                            </div>
                            <div class="panel-body" data-cs="cd3b38e7605171132dd4755ec5b83072"></div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</footer>
<nav class="section-footer-bottom footerNav2">
    <div class="wraper">
        <div class="container">
            <div class="theme-change">
                {{-- <a href="/about/?nvvithemever=r&amp;nv_redirect=OCGesEj8JW8OkIZgCYdzAXshjpsZOV7aavwH7NMaRxHvKhcaJQHTjWNCrTBuSofh" 
                rel="nofollow" title="Click để chuyển sang giao diện Tự động"><i class="fa fa-random"></i></a>
                <span title="Chế độ giao diện đang hiển thị: Máy Tính"><i class="fa fa-desktop"></i></span>
                <a href="/about/?nvvithemever=m&amp;nv_redirect=OCGesEj8JW8OkIZgCYdzAXshjpsZOV7aavwH7NMaRxHvKhcaJQHTjWNCrTBuSofh" 
                rel="nofollow" title="Click để chuyển sang giao diện Di động"><i class="fa fa-mobile"></i></a> --}}
            </div>
            <div class="bttop">
                <a class="pointer"><i class="fa fa-eject fa-lg"></i></a>
            </div>
        </div>
    </div>
</nav>