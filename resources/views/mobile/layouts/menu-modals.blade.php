<!-- Search form -->
<div id="headerSearch" class="hidden">
    <div class="headerSearch container-fluid margin-bottom">
        <div class="input-group">
            <input type="text" class="form-control" maxlength="60" placeholder="Tìm kiếm...">
            <span class="input-group-btn">
                <button type="button" class="btn btn-info">
                    <em class="fa fa-search fa-lg"></em>
                </button>
            </span>
        </div>
    </div>
</div>
<!-- SiteModal Required!!! -->
<div id="sitemodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <em class="fa fa-spinner fa-spin">&nbsp;</em>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="openidResult" class="nv-alert" style="display:none"></div>
<div id="openidBt" data-result="" data-redirect=""></div>

<div id="metismenu" class="hidden">
    <div class="clearfix panel metismenu">
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a title="GIỚI THIỆU" href="{{ route('about.index') }}">
                            GIỚI THIỆU
                        </a>
                    </li>
                    <li>
                        <a title="TIN TỨC" href="{{ route('home.index') }}">
                            TIN TỨC
                        </a>
                    </li>
                    <li>
                        <a title="THÔNG BÁO - THÔNG TIN" href="{{ route('documents.index') }}">
                            THÔNG BÁO - THÔNG TIN
                        </a>
                    </li>
                    <li>
                        <a title="LIÊN ĐOÀN LUẬT SƯ VIỆT NAM" href="https://www.liendoanluatsu.org.vn/" onclick="this.target='_blank'">
                            LIÊN ĐOÀN LUẬT SƯ VIỆT NAM
                        </a>
                    </li>
                    <li>
                        <a title="LIÊN HỆ" href="{{ route('contact.index') }}">
                            LIÊN HỆ
                        </a>
                    </li>
                    <li>
                        <a title="QUẢN LÝ LUẬT SƯ" href="{{ route('organs.index') }}">
                            QUẢN LÝ LUẬT SƯ
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
    </div>
</div>