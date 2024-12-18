<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Danh sách bài viết
                </h6>
                <div class="header-elements"></div>
            </div>

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
                                        <td class="text-left">{{ $post->title ?? '' }}</td>
                                        <td class="text-center">{{ $post->category->name ?? '' }}</td>
                                        <td class="text-center">
                                            @if ($post->published_at)
                                            <span class="badge badge-sm badge-success">Đã đăng</span>
                                            @else
                                            <span class="badge badge-sm badge-secondary">Nháp</span>
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
                                        <td colspan="4" class="text-center">(Danh sách trống)</td>
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