<div>
    <div wire:ignore.self class="modal fade" id="lawyerInfoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" wire:loading wire:target="modalSetup">
                <div class="container-fluid py-5">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm mr-2" role="status"></div>
                        <span class="ms-2">Vui lòng đợi</span>
                    </div>
                </div>
            </div>

            <div class="modal-content" wire:loading.remove wire:target="modalSetup">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin luật sư</h5>
                </div>
                <div class="modal-body">
                    @if ($lawyer)
                    <div class="row">
                        <div class="col-4">
                            <div class="border rounded">
                                @if ($lawyer->profile_pic)
                                <img src="{{ url($lawyer->profile_pic) }}" alt="" class="img-fluid">
                                @else
                                <img src="{{ asset('doanluatsudanang/themes/default/images/no-avatar.jpg') }}" alt="" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td class="text-nowrap"><strong>Họ & tên:</strong></td>
                                        <td>{{ $lawyer->fullname ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap"><strong>Số thẻ luật sư:</strong></td>
                                        <td>{{ $lawyer->card_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap"><strong>Tổ chức hành nghề:</strong></td>
                                        <td>{{ $lawyer->workplace ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap"><strong>Thuộc bộ phận:</strong></td>
                                        <td>{{ $lawyer->organization->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap"><strong>Ngày sinh:</strong></td>
                                        <td>{{ $lawyer->birthday->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap"><strong>Ngày cấp thẻ:</strong></td>
                                        <td>{{ $lawyer->card_issuance_date->format('d/m/Y') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#lawyerInfoModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-lawyer-id') ?? 0;
            @this.call('modalSetUp', id)
        })
    })
</script>
@endpush