@inject('categoryRepos', 'App\Repositories\Categories\CategoryRepositoryInterface')

<div class="col-sm-6 col-md-5 col-sm-pull-18 col-md-pull-19">
    <div class="panel panel-default">
        <div class="panel-heading">
            DANH MỤC
        </div>
        <div class="panel-body">
            <div class="clearfix panel metismenu">
                <aside class="sidebar">
                    <nav class="sidebar-nav">
                        <ul id="menu_53">
                            @php($categories = $categories ?? $categoryRepos->getAll())
                            @if($categories->count() > 0)
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category.posts.get', ['category' => $category]) }}" title="{{ $category->name }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            VĂN BẢN PHÁP LUẬT
        </div>
        <div class="panel-body">
            <div class="clearfix panel metismenu">
                <aside class="sidebar">
                    <nav class="sidebar-nav">
                        <ul id="menu_54">
                            <li>
                                <a href="/van-ban-phap-luat/van-ban-moi/" title="Văn bản mới">Văn bản mới</a>
                            </li>
                            <li>
                                <a href="/van-ban-phap-luat/hiep-phap/" title="Hiếp pháp">Hiếp pháp</a>
                            </li>
                            <li>
                                <a href="/van-ban-phap-luat/luat-phap-lenh/" title="Luật - Pháp lệnh">Luật - Pháp lệnh</a>
                            </li>
                            <li>
                                <a href="/van-ban-phap-luat/nghi-dinh/" title="Nghị định">Nghị định</a>
                            </li>
                            <li>
                                <a href="/van-ban-phap-luat/nghi-quyet/" title="Nghị quyết">Nghị quyết</a>
                            </li>
                            <li>
                                <a href="/van-ban-phap-luat/quyet-dinh/" title="Quyết định">Quyết định</a>
                            </li>
                            <li>
                                <a href="/van-ban-phap-luat/thong-tu/" title="Thông tư">Thông tư</a>
                            </li>
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Thống kê
        </div>
        <div class="panel-body">
            <ul class="counter list-none display-table">
                <li><span><em class="fa fa-bolt fa-lg fa-horizon"></em>Đang truy cập</span><span>3</span></li>
                <li><span><em class="fa fa-filter fa-lg fa-horizon margin-top-lg"></em>Hôm nay</span><span class="margin-top-lg">9,477</span></li>
                <li><span><em class="fa fa-calendar-o fa-lg fa-horizon"></em>Tháng hiện tại</span><span>151,797</span></li>
                <li><span><em class="fa fa-bars fa-lg fa-horizon"></em>Tổng lượt truy cập</span><span>650,832</span></li>
            </ul>
        </div>
    </div>
</div>