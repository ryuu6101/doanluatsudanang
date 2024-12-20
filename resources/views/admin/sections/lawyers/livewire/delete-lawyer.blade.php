<div>
    <div wire:ignore.self class="modal fade" id="deleteLawyerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col">
                            <span>Bạn có muốn xóa {{ $lawyer->fullname ?? '' }}?</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" wire:loading.attr="disabled" wire:click.prevent="delete">
                        Đồng ý
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#deleteLawyerModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-lawyer-id') ?? 0;
            @this.call('modalSetup', id);
        })

        $(document).on('close-delete-lawyer-modal', function() {
            $('#deleteLawyerModal').modal('hide');
        })
    })
</script>
@endpush
