@extends('yalla-gt.layout.app')
@section('content')
    <div class="page-div rtl-direction">
        <div class="card">
            <div class="card-body p-4">
               
                  @livewire('yalla-gt.cart.user-cart')
                
            </div>
        </div>

    </div>
@endsection
@section('footer')
    @include('yalla-gt.layout.upper-footer')
    @include('yalla-gt.layout.footer')
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyButton = document.querySelector('.cart-qty');

            qtyButton.addEventListener('click', function() {
                const qtyCounts = document.querySelector('.cart-qty-counts');
                qtyCounts.classList.toggle('show');
            });
        });
    </script>
@endsection
