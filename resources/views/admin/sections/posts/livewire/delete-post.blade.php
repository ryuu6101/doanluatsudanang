<div>
    <div wire:ignore.self class="modal fade" id="deletePostModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col">
                            <span>Bạn có muốn xóa bài viết?</span>
                        </div>
                    </div>
                    {{-- <div class="row mb-2">
                        <div class="col">
                            <input type="checkbox" id="perma-del-check" class="custom-control-input" wire:model.blur="perma_delete">
                            <label class="custom-control-label" for="perma-del-check">Bỏ qua mục rác và xóa vĩnh viễn</label>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" wire:loading.attr="disabled" wire:click.prevent="trash">
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
        $('#deletePostModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-post-id') ?? 0;
            @this.call('modalSetup', id);
        })

        $(document).on('close-delete-post-modal', function() {
            $('#deletePostModal').modal('hide');
        })
    })
</script>
@endpush
