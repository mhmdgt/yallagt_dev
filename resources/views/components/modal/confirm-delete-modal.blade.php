<div class="modal fade" id="confirmDeleteModal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" action="{{ $route }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-secondary">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            $('#confirmDeleteModal').modal('show');
        }
    </script>
</div>



