<div>
    <!-- Delete Button -->
    {{-- <button type="button" class="btn btn-inverse-danger" data-toggle="modal"
        data-target="#confirmDeleteModal{{ $id}}">Delete</button> --}}

        {{ $slot }}
        @dd($id);


    <!-- Delete Confirmation Modal -->
    <div class="modal fade hide-modal" id="confirmDeleteModal{{ $id }}" tabindex="-1" role="dialog"
        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">
                        Confirm
                        Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <form wire:submit.prevent='delete({{ $id }})'>
                        <button type="submit" class="btn btn-secondary">
                            Delete</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        // delete Confetmation //
        window.addEventListener('toast', (event) => {
            let data = event.detail;

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: data.type,
                title: data.title
            });
        });
        // Hide Modal //
        $wire.on('hide-modal-dispatch', (event) => {
            $('.hide-modal').modal('hide');
        });
    </script>
    @endscript
</div>
