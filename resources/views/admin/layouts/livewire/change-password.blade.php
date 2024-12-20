<div>
    <div wire:ignore.self class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Đổi mật khẩu
                    </h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save" id="changePasswordForm">

                        <div class="row">
                            <div class="col-12 mb-2">
                                <input type="password" class="form-control" placeholder="Mật khẩu cũ" wire:model.blur="current_password">
                                @error('current_password')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mb-2">
                                <input type="password" class="form-control" placeholder="Mật khẩu mới" wire:model.blur="new_password">
                                {{-- @error('new_password')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror --}}
                            </div>
                            <div class="col-12 mb-2">
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" 
                                wire:model.blur="new_password_confirmation">
                                @error('new_password')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer" wire:loading.remove wire:target="modalSetup">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="changePasswordForm">
                        <span><i class="icon-floppy-disk mr-2"></i></span>
                        Lưu
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#changePasswordModal').on('show.bs.modal', function(e) {
            @this.call('modalSetup');
        })

        $(document).on('close-change-password-modal', function() {
            $('#changePasswordModal').modal('hide');
        })
    })
</script>
@endpush
