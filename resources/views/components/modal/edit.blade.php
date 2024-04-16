{{-- ========================== Edit Modal ========================== --}}
<div class="modal fade hide-modal" id="editModal{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="forms-sample car-brand-model-edit" wire:submit.prevent="update({{ $id }})"
                    enctype="multipart/form-data">


                    {{ $slot }}

                    <div class="modal-footer">
                        <button type="submit" id="add_employee_btn" class="btn btn-primary">update
                            changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @script
        <script>
            // delete
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

            $wire.on('hide-modal-dispatch', () => {
                $('.hide-modal').modal('hide');
            });
        </script>
    @endscript
</div>
