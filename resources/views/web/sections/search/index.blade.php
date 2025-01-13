@extends('web.layouts.master')

@section('title', 'Tìm kiếm')

@section('contents')

<div class="page panel panel-default">
    <div class="panel-body">
        <div id="cse"></div>
        <div id="search-form" class="text-center">
            <h3 class="text-center margin-bottom-lg">Tìm và lấy những gì bạn muốn!</h3>
            <form action="{{ route('search.index') }}" name="form_search" method="get" id="form_search" role="form">
                <div class="m-bottom">
                    <div class="form-group">
                        <label class="sr-only" for="search_query">Từ tìm kiếm</label>
                        <input class="form-control" id="search_query" name="q" value="{{ $keyword ?? '' }}" 
                        maxlength="60" placeholder="Từ tìm kiếm">
                    </div>
                    {{-- <div class="form-group">
                        <label class="sr-only" for="search_query_mod">Tìm kiếm tại</label>
                        <select name="m" id="search_query_mod" class="form-control">
                            <option value="all">Tìm kiếm trên site</option>
                            <option data-adv="false" value="about">Giới thiệu</option>
                            <option data-adv="true" value="news" selected="selected">Tin Tức</option>
                            <option data-adv="false" value="page">Page</option>
                            <option data-adv="false" value="siteterms">Điều khoản sử dụng</option>
                            <option data-adv="true" value="van-ban-phap-luat">Văn Bản Pháp Luật</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <input type="submit" id="search_submit" value="Tìm kiếm" class="btn btn-primary">
                        {{-- <a href="#" class="advSearch">Nâng cao</a> --}}
                    </div>
                </div>
                {{-- <div class="radio">
                    <label class="radio-inline">
                        <input name="l" id="search_logic_and" type="radio" checked="checked" value="1">
                        Cả cụm từ
                    </label>
                    <label class="radio-inline">
                        <input name="l" id="search_logic_or" type="radio" value="0">
                        Tối thiểu 1 từ
                    </label>
                </div> --}}
            </form>
            <hr>
        </div>
        <div id="search_result">
            @if ($results->count() > 0)
            <ul class="nav nav-tabs m-bottom">
                <li class="active">
                    <a>Kết quả tìm kiếm &nbsp;&nbsp;<span class="label label-info">{{ $results->total() }}</span></a>
                </li>
            </ul>
            @foreach ($results as $result)
            <h3 class="margin-bottom-sm">
                <a href="{{ route('post.detail', ['category' => $result->category, 'post' => $result]) }}">
                    {!! $result->title !!}
                </a>
            </h3>
            <div class="margin-bottom-lg result-contents">{!! $result->hightlighted !!}</div>
            @endforeach
            <div class="text-center">
                {!! $results->appends(['q' => $keyword])->links('web.components.pagination') !!}
            </div>
            @else
            <span>Không tìm thấy dữ liệu nào có liên quan đến "{{ $keyword ?? '' }}"</span>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    //<![CDATA[
    $('#search_query_mod').change(function(){
        var data = $(this).find('option:selected').data();
        if( data.adv == true ){
            $("a.advSearch").show();
        }else if( data.adv == false ){
            $("a.advSearch").hide();
        }else{
            $("a.advSearch").show();
        }
    });
    $("a.advSearch").click(function(e){
        e.preventDefault();
        var b = $("#form_search #search_query_mod").val();
        if("all" == b){
            return alert("Hãy chọn Khu vực tìm kiếm"), $("#form_search #search_query_mod").focus(), !1
        }
        var b = nv_base_siteurl + "index.php?" + nv_lang_variable + "=" + nv_lang_data + "&" + nv_name_variable + "=" 
                + b + "&" + nv_fc_variable + "=search", a = $("#form_search #search_query").val(), a = strip_tags(a);
        3 <= a.length && 60 >= a.length && (a = rawurlencode(a), b = b + "&q=" + a);

        window.location.href = b;
    });
    $("a.IntSearch").click(function(){
        var a = $("#form_search [name=q]").val();
        $("#search-form").hide();
        $("#search_result").hide();
        var customSearchControl = new google.search.CustomSearchControl('');
        customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
        customSearchControl.draw('cse');
        customSearchControl.execute(a);
    });
    $("#form_search").submit(function(){
        var a = $("#form_search [name=q]").val(), a = strip_tags(a), b;
        $("#form_search [name=q]").val(a);
        if(3 > a.length || 60 < a.length){
            return $("#form_search [name=q]").select(), !1
        }
        return true;
    });
    //]]>
</script>
@endpush