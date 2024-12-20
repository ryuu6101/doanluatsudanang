<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-section sidebar-user my-1">
            <div class="sidebar-section-body">
                <div class="media">
                    <a href="#" class="mr-3">
                        <img src="{{ asset('images/clipart3643767.png') }}" class="rounded-circle" alt="">
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">{{ auth()->user()->fullname }}</div>
                        {{-- <div class="font-size-sm line-height-sm opacity-50">
                            Senior developer
                        </div> --}}
                    </div>

                    <div class="ml-3 align-self-center">
                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                            <i class="icon-transmission"></i>
                        </button>

                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                            <i class="icon-cross2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Menu</div> 
                    <i class="icon-menu" title="Main"></i>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link dashboard">
                        <i class="icon-home4"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li class="nav-item nav-item-submenu post-manager">
                    <a href="#" class="nav-link">
                        <i class="icon-stack-text"></i> 
                        <span>Bài viết</span>
                    </a>

                    <ul class="nav nav-group-sub">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link categories">
                                Danh mục
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index') }}" class="nav-link posts">
                                Quản lý bài viết
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu personnel-manager">
                    <a href="#" class="nav-link">
                        <i class="icon-users"></i> 
                        <span>Nhân sự</span>
                    </a>

                    <ul class="nav nav-group-sub">
                        <li class="nav-item">
                            <a href="{{ route('admin.organizations.index') }}" class="nav-link organizations">
                                Tổ chức
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.lawyers.index') }}" class="nav-link lawyers">
                                Quản lý luật sư
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.file-manager.index') }}" class="nav-link file-manager">
                        <i class="icon-files-empty"></i>
                        <span>Quản lý file</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.site-config.index') }}" class="nav-link site-config">
                        <i class="icon-info22"></i>
                        <span>Thông tin website</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        let submenu = {{ Js::from($menu['submenu'] ?? '') }};
        let sidebar = {{ Js::from($menu['sidebar'] ?? '') }};
        
        if (submenu != '') {
            $('.nav-item.nav-item-submenu.'+submenu).addClass('nav-item-open');
            $('.nav-item.nav-item-submenu.'+submenu+' > .nav.nav-group-sub').show();
        }

        if (sidebar != '') {
            $('.nav-link.'+sidebar).addClass('active');
        }
    })
</script>
@endpush