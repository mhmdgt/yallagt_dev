   {{-- ========================== Add body sheps ========================== --}}

   <div class="modal fade  hide-modal" id="store-body-shape" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true" wire:ignore.self>

   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add new {{ $title }}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">

               <form class="forms-sample" wire:submit.prevent='store' enctype="multipart/form-data">
                 
{{ $slot }}
                 
                   <div class="modal-footer">
                       <button type="submit" id="add_employee_btn" class="btn btn-primary">Save
                           changes</button>
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </div>
               </form>

           </div>
       </div>
   </div>
   
@script
<script>
    $wire.on('hide-modal-dispatch', () => {
            $('.hide-modal').modal('hide');
        });
      

        window.addEventListener('alert', (event) => {
            let data = event.detail;

            console.log(data);

            Swal.fire({
                position: data.position,
                icon: data.type,
                title: data.title,
                showConfirmButton: true,
                timer: 1500
            });
        })
       
</script>
@endscript
</div>