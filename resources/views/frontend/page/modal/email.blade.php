<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal_content_mail">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="emailModalLabel">Contact Agent</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center text-danger">
                    <a href="mailto:{{ $property->User?->email }}" class="mb-3">Agent Mail : {{ $property->User?->email }}</a>
                </div>
                {{-- <form action="{{ route('agent.mail.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12 col-12 mb-30">
                        <input name="name" type="text" placeholder="Name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12 col-12 mb-30">
                        <input name="email" type="email" placeholder="Email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12 col-12 mb-30">
                        <input name="phone" type="text" placeholder="Phone Number">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 mb-30">
                        <textarea name="message" placeholder="Message"></textarea>
                        @error('message')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Send Mail</button>
                </form> --}}
            </div>
        </div>
    </div>
</div>
