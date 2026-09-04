@php
    $popup = \App\Models\Popup::where('is_active', 1)->latest()->first();
@endphp

@if($popup)
    <div class="modal fade" id="dritPopupModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

                <img id="popup-img" src="{{ asset('storage/' . $popup->image) }}" class="img-fluid w-100" alt="Popup Image">

            </div>
        </div>
    </div>
@endif