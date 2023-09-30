<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal_content_contact">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Contact Us</h4><br>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <a href="{{ route('index') }}">aponthikana.com</a><br>
                <a href="tel:{{ $property->User?->phone }}">{{ $property->User?->phone }}</a>
            </div>
        </div>
    </div>
</div>


