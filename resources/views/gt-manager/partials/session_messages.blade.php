@if ($errors->any() || Session::has('success') || Session::has('fail'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: '{{ $error }}'
                });
            @endforeach
        @endif

        @if (Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}'
            });
        @elseif (Session::has('fail'))
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get('fail') }}'
            });
        @endif
    });
</script>
@endif


{{-- @if (Session::has('success')) --}}
    {{-- Popup-seccuss --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}',
                showConfirmButton: true, // Set to true to show confirm button
                confirmButtonText: 'Done', // Customize the button text
                // timer: 1500
            });
        });
    </script> --}}

    {{-- toast-seccuss --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}'
            });
        });
    </script> --}}
{{-- @endif --}}
