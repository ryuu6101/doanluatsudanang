<div class="row">
    <div class="col">
        <div class="card">
            {{-- <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Danh sách bài viết
                </h6>
                <div class="header-elements"></div>
            </div> --}}

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-auto">
                        <select class="custom-select w-auto" wire:model.live="paginate">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="Tìm kiếm" wire:model.live="params.name">
                    </div>
                    <div class="col-auto">
                        <select class="custom-select w-auto" wire:model.live="params.category_id">
                            <option value="">Tất cả danh mục</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control daterange-picker cursor-pointer" readonly placeholder="Ngày đăng bài">
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('post.create') }}" class="btn btn-sm btn-success">
                            <i class="icon-plus3 mr-2"></i>
                            Thêm mới
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark table-sm align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 5%">STT</th>
                                        {{-- <th scope="col" class="text-center" style="width: 15%"></th> --}}
                                        <th scope="col" class="text-center" style="width: auto">Bài viết</th>
                                        <th scope="col" class="text-center" style="width: auto">Danh mục</th>
                                        <th scope="col" class="text-center" style="width: auto">Trạng thái</th>
                                        <th scope="col" class="text-center" style="width: auto">Thời gian đăng</th>
                                        <th scope="col" class="text-center" style="width: 10%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($posts && count($posts) > 0)
                                    @php($sn = ($posts->perPage() * ($posts->currentPage() - 1)) + 1)
                                    @foreach ($posts as $key => $post)
                    
                                    <tr>
                                        <td class="text-center">{{ $sn++ }}</td>
                                        {{-- <td class="text-center">
                                            <img src="{{ asset($post->thumbnail) }}" alt="" class="img-fluid">
                                        </td> --}}
                                        <td class="text-left text-wrap">{{ $post->title ?? '' }}</td>
                                        <td class="text-center">{{ $post->category->name ?? '' }}</td>
                                        <td class="text-center">
                                            @if (!$post->published_at)
                                            <span class="badge badge-sm badge-secondary">Nháp</span>
                                            @elseif ($post->public)
                                            <span class="badge badge-sm badge-success">Đã đăng</span>
                                            @else
                                            <span class="badge badge-sm badge-danger">Đã ẩn</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($post->published_at)
                                            <span>{{ $post->published_at->format('d/m/Y H:i:s') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="badge badge-sm badge-success">
                                                <i class="icon-pencil5"></i>
                                            </a>
                                            <span type="button" class="badge badge-sm badge-danger" 
                                            data-toggle="modal" data-target="#deletePostModal" data-post-id="{{ $post->id }}">
                                                <i class="icon-trash"></i>
                                            </span>
                                        </td>
                                    </tr>
                    
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center">(Danh sách trống)</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @include('admin.components.livewire-table-nav', ['collection' => $posts])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.daterange-picker').daterangepicker({
            parentEl: '.content-inner',
            autoUpdateInput: false,
            showDropdowns: true,
            opens: 'left',
            drops: 'down',
            locale: {
                applyLabel: 'OK',
                cancelLabel: 'Xóa',
                daysOfWeek: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7','CN'],
                monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                firstDay: 1,
                format: 'DD/MM/YYYY',
            }
        }).on('cancel.daterangepicker', function(ev, picker) {
            $(this).val("");
            @this.set('params.published_date_start', '');
            @this.set('params.published_date_end', '');
        }).on('apply.daterangepicker', function(ev, picker) {
            var start_date = picker.startDate.format('DD/MM/YYYY');
            var end_date = picker.endDate.format('DD/MM/YYYY');
            $(this).val(start_date+' - '+end_date);
            @this.set('params.published_date_start', start_date);
            @this.set('params.published_date_end', end_date);
        });
    })
</script>
@endpush