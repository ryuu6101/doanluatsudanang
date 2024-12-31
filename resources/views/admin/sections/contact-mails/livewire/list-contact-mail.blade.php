<div class="row">
    <div class="col">
        <div class="card">
            {{-- <div class="card-header header-elements-inline">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Liên hệ
                </h6>
                <div class="header-elements"></div>
            </div> --}}

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="Tìm kiếm" wire:model.live="params.detail">
                    </div>
                    <div class="col-auto">
                        <select class="form-select custom-select w-auto" wire:model.live="params.read">
                            <option value="">Tất cả</option>
                            <option value="!1">Tin chưa đọc</option>
                            <option value="1">Tin đã đọc</option>
                        </select>
                    </div>
                    <div class="col text-right">
                        <select class="form-select custom-select w-auto" wire:model.live="paginate">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark table-sm align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 5%">STT</th>
                                        <th scope="col" class="text-center" style="width: auto">Tên người gửi</th>
                                        <th scope="col" class="text-center" style="width: auto">Email</th>
                                        <th scope="col" class="text-center" style="width: auto">Tiêu đề gửi</th>
                                        <th scope="col" class="text-center" style="width: auto">Thời gian gửi</th>
                                        <th scope="col" class="text-center" style="width: 5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($contact_mails && count($contact_mails) > 0)
                                    @php($sn = ($contact_mails->perPage() * ($contact_mails->currentPage() - 1)) + 1)
                                    @foreach ($contact_mails as $key => $contact_mail)
                    
                                    <tr>
                                        <td class="text-center">{{ $sn++ }}</td>
                                        <td class="text-left">
                                            <span>{{ $contact_mail->fullname ?? '' }}</span>
                                            @if ($contact_mail->read)
                                            <span class="badge badge-warning float-right">
                                                <i class="icon-mail-read"></i>
                                            </span>
                                            @else
                                            <span class="badge badge-success float-right">
                                                <i class="icon-mail5"></i>
                                            </span>
                                            @endif
                                        </td>
                                        <td class="text-left">{{ $contact_mail->email ?? '' }}</td>
                                        <td class="text-left">{{ $contact_mail->title ?? '' }}</td>
                                        <td class="text-center">{{ $contact_mail->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            <span type="button" class="badge badge-sm badge-primary" 
                                            data-toggle="modal" data-target="#contactDetailModal" data-contact-id="{{ $contact_mail->id }}">
                                                <i class="icon-eye"></i>
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
                        @include('admin.components.livewire-table-nav', ['collection' => $contact_mails])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>