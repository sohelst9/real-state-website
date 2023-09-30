@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Website Setting</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('setting.change') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="site_logo">Site Logo</label>
                                <input type="file" name="site_logo" class="form-control" id="site_logo" />
                                    @error('site_logo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if ($setting->site_logo ?? null)
                                        <img src="{{ asset('Uploads/SiteLogo/'.$setting->site_logo) }}" width="100" alt="">
                                    @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ $setting->address ?? null }}" />
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ $setting->phone ?? null }}" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ $setting->email ?? null }}" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="footer_content">Footer Content</label>
                                <textarea name="footer_content" class="form-control" id="footer_content"> {{ $setting->footer_content ?? null }}</textarea>
                                    @error('footer_content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <hr>
                            <div class="social_title">
                                <h5 class="">Social Icon Link</h5>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="facebook" value="{{ $setting->facebook ?? null }}" />
                                    @error('facebook')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="twitter">Twitter</label>
                                <input type="text" name="twitter" class="form-control" id="twitter" value="{{ $setting->twitter ?? null }}" />
                                    @error('twitter')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="linkedin">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" id="linkedin" value="{{ $setting->linkedin ?? null }}" />
                                    @error('linkedin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="instagram">Instagram</label>
                                <input type="text" name="instagram" class="form-control" id="instagram" value="{{ $setting->instagram ?? null }}" />
                                    @error('instagram')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="youtube">Youtube</label>
                                <input type="text" name="youtube" class="form-control" id="youtube" value="{{ $setting->youtube ?? null }}" />
                                    @error('youtube')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
