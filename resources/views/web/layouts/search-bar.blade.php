<nav class="third-nav">
    <div class="row">
        <div class="bg">
        <div class="clearfix">
            <div class="col-xs-24 col-sm-18 col-md-18">
                <span class="current-time">@yield('current_time')</span>
            </div>
            <div class="headerSearch col-xs-24 col-sm-6 col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" maxlength="60" placeholder="Tìm kiếm..."><span class="input-group-btn"><button type="button" class="btn btn-info" data-url="/seek/?q=" data-minlength="3" data-click="y"><em class="fa fa-search fa-lg"></em></button></span>
                </div>
            </div>
        </div>
        </div>
    </div>
</nav>