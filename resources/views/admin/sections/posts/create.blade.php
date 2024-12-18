@extends('admin.layouts.master')

@section('title', 'Thêm bài viết mới')

@section('contents')

<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <input type="text" name="title" class="form-control" placeholder="Tiêu đề">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea name="description" class="form-control mt-2 mb-2" placeholder="Mô tả"
                    style="min-height: 5rem">{{ old('description') }}</textarea>
                    <textarea name="contents" class="form-control editor" id="contents">{!! old('contents') !!}</textarea>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-white py-2"><strong>Đăng bài</strong></div>
                <div class="card-body px-2">
                    <div class="row">
                        <div class="col-5 col-form-label">
                            <i class="icon-eye text-muted mr-1"></i>
                            <span>Hiển thị:
                        </div>
                        <div class="col-7">
                            <select name="public" class="form-control form-control-sm">
                                <option value="1" {{ old('public') === 1 ? 'selected' : '' }}>Công khai</option>
                                <option value="0" {{ old('public') === 0 ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-form-label">
                            <i class="icon-calendar text-muted mr-1"></i>
                            <span>Ngày đăng:
                        </div>
                        <div class="col-7">
                            <input type="text" name="published_at" class="form-control form-control-sm" 
                            value="{{ old('published_at') ?? 'Bây giờ' }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2">
                    <button type="submit" class="btn btn-outline-secondary btn-sm" name="published" value=0>
                        Lưu bản nháp
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm float-right" name="published" value=1>
                        Đăng
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-white py-2"><strong>Ảnh bìa</strong></div>
                <div class="card-body">
                    <input type="hidden" name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}">
                    <a href="javascript:open_filemanager('thumbnail')">
                        @if (old('thumbnail'))
                        <img src="{{ asset(old('thumbnail')) }}" alt=""  
                        class="img-fluid w-100 rounded thumbnail-preview">
                        @else
                        <img src="{{ asset('images/placeholders/placeholder.png') }}" alt=""  
                        class="img-fluid w-100 rounded thumbnail-preview">
                        @endif
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-white py-2"><strong>Danh mục</strong></div>
                <div class="card-body">
                    @if ($categories->count() > 0)
                    <select name="category_id" class="custom-select">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <select name="category_id" class="custom-select" disabled></select>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    var options = { 
        selector: ".editor",theme: "modern",width: '100%',height: 500, 
        plugins: [ 
            "advlist autolink link image lists charmap print preview hr anchor pagebreak", 
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking", 
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code" 
        ], 
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect", 
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ", 
        image_advtab: true , 
        
        external_filemanager_path:"{{ url('responsive_filemanager/filemanager') }}/", 
        filemanager_title:"Trình quản lý tệp" , 
        external_plugins: { "filemanager" : "{{ url('responsive_filemanager/filemanager/plugin.min.js') }}"} 
    };

    function open_filemanager() {
        var url = "{{ url('responsive_filemanager/filemanager/dialog.php') }}?type=1&popup=1&field_id=thumbnail";
        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width - w) / 2);
        var t = Math.floor((screen.height - h) / 2);
        var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    }

    function responsive_filemanager_callback(field_id) {
        var url = jQuery('#'+field_id).val();
        $('.thumbnail-preview').attr('src', url);
    }

    $(document).ready(function() {
        tinymce.init(options);
    })
</script>
@endpush