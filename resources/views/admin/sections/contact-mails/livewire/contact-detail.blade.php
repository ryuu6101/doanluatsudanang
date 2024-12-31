<div>
    <div wire:ignore.self class="modal fade" id="contactDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" wire:loading wire:target="modalSetup">
                <div class="container-fluid py-5">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm mr-2" role="status"></div>
                        <span class="ms-2">Vui lòng đợi</span>
                    </div>
                </div>
            </div>

            @if ($contact_mail)
            <div class="modal-content" wire:loading.remove wire:target="modalSetup">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="icon-mail-read mr-1"></i>
                        <strong>{{ $contact_mail->title ?? '' }}</strong>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td class="text-nowrap align-top"><strong>Thông tin người gửi:</strong></td>
                                <td>
                                    <span>{{ $contact_mail->fullname ?? '' }} {{ '<'.($contact_mail->email ?? '').'>' }}</span> <br>
                                    <span>Điện thoại: {{ $contact_mail->phone ?? '' }}</span> <br>
                                    <span>Địa chỉ: {{ $contact_mail->address ?? '' }}</span> <br>
                                    <span>{{ $contact_mail->created_at->format('d/m/Y') }}</span>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td class="text-nowrap"><strong>Chủ đề:</strong></td>
                                <td>{{ $contact_mail->subject ?? '' }}</td>
                            </tr> --}}
                            <tr>
                                <td colspan="2" class="text-wrap">{{ $contact_mail->contents }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.response.index', ['contact_mail' => $contact_mail]) }}">
                        Gửi phản hồi
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm" wire:click.prevent="delete">
                        Xóa
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" wire:click.prevent="mark_unread">
                        Đánh dấu là chưa đọc
                    </button>
                    {{-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button> --}}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#contactDetailModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-contact-id') ?? 0;
            @this.call('modalSetUp', id)
        });

        $(document).on('close-contact-detail-modal', function() {
            $('#contactDetailModal').modal('hide');
        });
    })
</script>
@endpush