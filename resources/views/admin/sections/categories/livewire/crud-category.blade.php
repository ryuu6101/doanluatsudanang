<div>
    <div wire:ignore.self class="modal fade" id="crudCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
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
                    <h5 class="modal-title">
                        @if ($action == 'create')
                        Thêm mới danh mục
                        @elseif ($action == 'update')
                        Chỉnh sửa danh mục
                        @elseif ($action == 'delete')
                        Xác nhận
                        @endif
                    </h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent={{ $action }} id="crudCategoryForm">

                        @if ($action == 'delete')
                        <div class="row">
                            <div class="col">
                                <span>Bạn có muốn xóa {{ $category->name }}?</span>
                            </div>
                        </div>
                        @else
                        <div class="row">

                            <div class="col-12 mb-2">
                                <input type="text" class="form-control" placeholder="Tên danh mục" wire:model.blur="name">
                                @error('name')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                        @endif

                    </form>
                </div>
                <div class="modal-footer" wire:loading.remove wire:target="modalSetup">
                    @if ($action == 'delete')
                    <button type="submit" class="btn btn-danger" form="crudCategoryForm">Đồng ý</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    @else
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" form="crudCategoryForm">
                        <span><i class="icon-floppy-disk mr-2"></i></span>
                        Lưu
                    </button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#crudCategoryModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-category-id') ?? 0;
            @this.call('modalSetup', id);
        })

        $(document).on('close-crud-category-modal', function() {
            $('#crudCategoryModal').modal('hide');
        })
    })
</script>
@endpush
