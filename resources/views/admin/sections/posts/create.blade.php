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
                    <textarea name="description" class="form-control mt-2 mb-2" placeholder="Giới thiệu"
                    style="min-height: 5rem">{{ old('description') }}</textarea>
                    <textarea name="contents" class="form-control editor" id="contents">{!! old('contents') !!}</textarea>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-white py-2"><strong>Xuất bản</strong></div>
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
                            <input type="text" name="published_at" class="form-control form-control-sm datepicker cursor-pointer" 
                            value="{{ old('published_at') ?? '' }}" placeholder=" Bây giờ" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2">
                    <button type="submit" class="btn btn-outline-secondary btn-sm" name="publish" value=0>
                        Lưu bản nháp
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm float-right" name="publish" value=1>
                        Đăng
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-white py-2"><strong>Ảnh bìa</strong></div>
                <div class="card-body">
                    <input type="hidden" name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}">
                    <a href="javascript:open_filemanager('thumbnail', 1)">
                        @php($img_url = old('thumbnail') ?? asset('images/placeholders/placeholder.png'))
                        <img src="{{ $img_url }}" alt="thumbnail" class="img-fluid w-100 rounded thumbnail-preview border mb-2">
                    </a>
                    <input type="text" name="thumbnail_description" class="form-control mb-2" 
                    placeholder="Mô tả" value="{{ old('thumbnail_description') }}">
                    @php($thumbnail_position = old('thumbnail_position') ?? 2)
                    <select name="thumbnail_position" class="custom-select mb-2">
                        <option value="0" {{ $thumbnail_position == 0 ? 'selected' : '' }}>Không hiển thị</option>
                        <option value="1" {{ $thumbnail_position == 1 ? 'selected' : '' }}>Hiển thị bên trái phần mở đầu</option>
                        <option value="2" {{ $thumbnail_position == 2 ? 'selected' : '' }}>Hiển thị dưới phần mở đầu</option>
                    </select>
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
            <div class="card">
                <div class="card-header bg-white py-2">
                    <input type="hidden" id="attachment">
                    <a href="javascript:open_filemanager('attachment', 2)" class="list-icons-item d-inline">
                        <strong>File đính kèm</strong>
                        <i class="icon-attachment float-right"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row attachment-container">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    var tinymce_options = { 
        selector: ".editor",theme: "modern",width: '100%',height: 480, 
        plugins: [ 
            "advlist autolink link image lists charmap print preview hr anchor pagebreak", 
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking", 
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code" 
        ], 
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect", 
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ", 
        image_advtab: true,
        // image_prepend_url: "{{ asset('') }}",
        relative_urls : false,
        image_class_list: [
            { title: 'Full width', value: 'full-width-img' },
            { title: 'None', value: '' },
        ],
        content_style: `
            body {
                padding-bottom: 10rem;
                overscroll-behavior: none;
            }
            img {
                width: 100%;
                height: auto;
            }
        `,
        
        external_filemanager_path:"{{ url('responsive_filemanager/filemanager') }}/", 
        filemanager_title:"Trình quản lý tệp" , 
        external_plugins: { "filemanager" : "{{ url('responsive_filemanager/filemanager/plugin.min.js') }}"} 
    };

    let first_visit = true;
    function open_filemanager(field_id, type) {
        var url = "{{ url('responsive_filemanager/filemanager/dialog.php') }}?type="
                    +type+"&popup=1&field_id="+field_id;

        if (first_visit) {
            url = url+"&fldr=uploads/news/&sort_by=name&descending=0";
            first_visit = false;
        }

        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width - w) / 2);
        var t = Math.floor((screen.height - h) / 2);
        var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    }

    function responsive_filemanager_callback(field_id) {
        var url = jQuery('#'+field_id).val();
        try {url = JSON.parse(url)} catch (error) {}
        if (field_id == 'thumbnail') {
            if (Array.isArray(url)) $('.thumbnail-preview').attr('src', url[0]);
            else $('.thumbnail-preview').attr('src', url);
        } else if (field_id == 'attachment') {
            if (Array.isArray(url)) {
                url.forEach(add_attachment);
            } else {
                add_attachment(url);
            }
        }
    }

    function add_attachment(item) {
        var attachment_container = $('.attachment-container');
        var attachments = $('.attachment-input').map(function() {
            return $(this).val();
        }).get();
        if (attachments.includes(item)) return;

        var filename = item.split('\\').pop().split('/').pop();
        var row = `
            <div class="col-12 d-flex flex-nowrap justify-content-between mb-1">
                <strong class="text-nowrap overflow-hidden" style="text-overflow: ellipsis;">
                    <i class="icon-file-pdf mr-1"></i>
                    ${filename}
                </strong>
                <a href="javascript:void(0);" class="text-danger" onclick="this.parentElement.remove()">
                    <i class="icon-trash"></i>
                </a>
                <input type="hidden" name="attachments[${filename}]" value="${item}" class="attachment-input">
            </div>
        `;

        attachment_container.append(row);
    }

    $(document).ready(function() {
        // $('.sidebar.sidebar-main').addClass('sidebar-main-resized');

        tinymce.init(tinymce_options);

        $('.datepicker').daterangepicker({
            parentEl: '.content-inner',
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            timePicker: true,
            timePicker24Hour: true,
            opens: 'left',
            drops: 'auto',
            locale: {
                applyLabel: 'OK',
                cancelLabel: 'Bây giờ',
                daysOfWeek: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7','CN'],
                monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                firstDay: 1,
                format: 'DD/MM/YYYY HH:mm',
            }
        }).on('cancel.daterangepicker', function(ev, picker) {
            $(this).val("{{ now()->format('d/m/Y H:i') }}");
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY HH:mm'));
        });
    })
</script>
@endpush