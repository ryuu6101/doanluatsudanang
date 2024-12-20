<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Danh sách luật sư
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
                        <input type="text" class="form-control" placeholder="Tìm kiếm" wire:model.live="params.fullname">
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('lawyer.create') }}" class="btn btn-sm btn-success">
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
                                        <th scope="col" class="text-center" style="width: auto">Họ & tên</th>
                                        <th scope="col" class="text-center" style="width: auto">Số thẻ</th>
                                        {{-- <th scope="col" class="text-center" style="width: auto">Tổ chức hành nghề</th> --}}
                                        <th scope="col" class="text-center" style="width: auto">Bộ phận</th>
                                        <th scope="col" class="text-center" style="width: auto">Ngày sinh</th>
                                        <th scope="col" class="text-center" style="width: auto">Ngày cấp thẻ</th>
                                        <th scope="col" class="text-center" style="width: 15%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($lawyers && count($lawyers) > 0)
                                    @php($sn = ($lawyers->perPage() * ($lawyers->currentPage() - 1)) + 1)
                                    @foreach ($lawyers as $key => $lawyer)
                    
                                    <tr>
                                        <td class="text-center">{{ $sn++ }}</td>
                                        {{-- <td class="text-center">
                                            <img src="{{ asset($lawyer->profile_pic) }}" alt="" class="img-fluid">
                                        </td> --}}
                                        <td class="text-left">{{ $lawyer->fullname ?? '' }}</td>
                                        <td class="text-center">{{ $lawyer->card_number ?? '' }}</td>
                                        {{-- <td class="text-center">{{ $lawyer->workplace ?? '' }}</td> --}}
                                        <td class="text-center">{{ $lawyer->organization->name ?? '' }}</td>
                                        <td class="text-center">
                                            @if ($lawyer->birthday)
                                            {{ $lawyer->birthday->format('d/m/Y') }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($lawyer->card_issuance_date)
                                            {{ $lawyer->card_issuance_date->format('d/m/Y') }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span type="button" class="badge badge-sm badge-primary" 
                                            data-toggle="modal" data-target="#lawyerInfoModal" data-lawyer-id="{{ $lawyer->id }}">
                                                <i class="icon-eye"></i>
                                            </span>
                                            <a href="{{ route('lawyer.edit', ['lawyer' => $lawyer->id]) }}" class="badge badge-sm badge-success">
                                                <i class="icon-pencil5"></i>
                                            </a>
                                            <span type="button" class="badge badge-sm badge-danger" 
                                            data-toggle="modal" data-target="#deleteLawyerModal" data-lawyer-id="{{ $lawyer->id }}">
                                                <i class="icon-trash"></i>
                                            </span>
                                        </td>
                                    </tr>
                    
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">(Danh sách trống)</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @include('admin.components.livewire-table-nav', ['collection' => $lawyers])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>