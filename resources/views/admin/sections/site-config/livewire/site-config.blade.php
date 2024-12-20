<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <input type="text" class="form-control mb-3" placeholder="Tên cơ quan" wire:model.blur="company_name">
                <input type="text" class="form-control mb-3" placeholder="Địa chỉ" wire:model.blur="address">
                <input type="text" class="form-control mb-3" placeholder="Số điện thoại" wire:model.blur="phone">
                <input type="text" class="form-control mb-3" placeholder="Email" wire:model.blur="email">
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