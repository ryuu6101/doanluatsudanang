<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                {{-- <input type="text" class="form-control mb-3" placeholder="Địa chỉ gửi mail" wire:model.blur="from_address">
                <input type="text" class="form-control mb-3" placeholder="Tên người gửi" wire:model.blur="from_name"> --}}
                <input type="text" class="form-control mb-3" placeholder="Địa chỉ email" wire:model.blur="username">
                <input type="text" class="form-control mb-3" placeholder="Mật khẩu ứng dụng" wire:model.blur="password">
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary float-right" wire:click.prevent="save">
                    <div class="icon-floppy-disk mr-1"></div>
                    Lưu
                </button>
            </div>
        </div>
    </div>
</div>