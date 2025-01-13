@extends('admin.layouts.master')

@section('title', 'Sửa thông tin luật sư')

@section('contents')

<form action="{{ route('lawyer.update', ['lawyer' => $lawyer->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 text-center px-5">
                            <label><strong>Ảnh hồ sơ</strong></label>
                            <input type="hidden" name="profile_pic" id="profile_pic" value="{{ old('profile_pic') }}">
                            <a href="javascript:open_filemanager('profile_pic')">
                                @if (old('profile_pic'))
                                <img src="{{ old('profile_pic') }}" alt="" 
                                class="img-fluid w-100 rounded border border profile-pic-preview">
                                @elseif ($lawyer->profile_pic)
                                <img src="{{ url($lawyer->profile_pic) }}" alt="" 
                                class="img-fluid w-100 rounded border border profile-pic-preview">
                                @else
                                <img src="{{ asset('doanluatsudanang/themes/default/images/no-avatar.jpg') }}" alt="" 
                                class="img-fluid w-100 rounded border border profile-pic-preview">
                                @endif
                            </a>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <th>Họ & tên</th>
                                        <td>
                                            <input type="text" name="fullname" class="form-control" 
                                            value="{{ old('fullname') ?? $lawyer->fullname }}">
                                            @error('fullname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Số thẻ luật sư</th>
                                        <td>
                                            <input type="number" name="card_number" class="form-control hidden-arrow" 
                                            value="{{ old('card_number') ?? $lawyer->card_number }}">
                                            @error('card_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tổ chức hành nghề</th>
                                        <td>
                                            <input type="text" name="workplace" class="form-control" 
                                            value="{{ old('workplace') ?? $lawyer->workplace }}">
                                            @error('workplace')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Thuộc bộ phận</th>
                                        <td>
                                            @if ($organizations->count() > 0)
                                            <select name="organization_id" class="custom-select">
                                                @php($organization_id = old('organization_id') ?? $lawyer->organization_id)
                                                @foreach ($organizations as $organization)
                                                <option value="{{ $organization->id }}" 
                                                {{ $organization_id == $organization->id ? 'selected' : '' }}>
                                                    {{ $organization->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @else
                                            <select name="organization_id" class="custom-select" disabled></select>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Ngày sinh</th>
                                        <td>
                                            <input type="text" class="form-control datepicker cursor-pointer" 
                                            name="birthday"readonly value="{{ old('birthday') ?? $lawyer->birthday->format('d/m/Y') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Ngày cấp thẻ</th>
                                        <td>
                                            <input type="text" class="form-control datepicker cursor-pointer" name="card_issuance_date" 
                                            readonly value="{{ old('card_issuance_date') ?? $lawyer->card_issuance_date->format('d/m/Y') }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right px-5">
                        <i class="icon-floppy-disk mr-1"></i>
                        Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
    let first_visit = true;
    function open_filemanager(field_id) {
        var url = "{{ url('responsive_filemanager/filemanager/dialog.php') }}?type=1&popup=1&field_id="+field_id;

        if (first_visit) {
            url = url+"&fldr=uploads/organs/&sort_by=name&descending=0";
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
        $('.profile-pic-preview').attr('src', url);
    }

    $(document).ready(function() {
        // $('.sidebar.sidebar-main').addClass('sidebar-main-resized');

        $('.datepicker').daterangepicker({
            parentEl: '.content-inner',
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            opens: 'left',
            drops: 'down',
            locale: {
                applyLabel: 'OK',
                cancelLabel: 'Hôm nay',
                daysOfWeek: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7','CN'],
                monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                firstDay: 1,
                format: 'DD/MM/YYYY',
            }
        }).on('cancel.daterangepicker', function(ev, picker) {
            $(this).val("{{ today()->format('d/m/Y') }}");
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
        });
    })
</script>
@endpush