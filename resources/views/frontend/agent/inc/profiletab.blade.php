<div id="profile-tab" class="tab-pane show active">
    <form action="{{ route('agent.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 mb-30 text-center">
                @if ($user->image)
                    <img class="agent_profile_show_image" src="{{ asset('Uploads/Users/' . $user->image) }}"
                        alt="">
                @else
                    <img class="agent_profile_show_image" src="{{ asset('frontend/assets/logo/logo.jpeg') }}"
                        alt="">
                @endif
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="f_name">First Name</label>
                <input type="text" name="fname" id="f_name" value="{{ $user->fname }}">
                @error('fname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="l_name">Last Name</label>
                <input type="text" name="lname" id="l_name" value="{{ $user->lname }}">
                @error('lname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="username">User Name</label>
                <input type="text" name="UserName" id="username" value="{{ $user->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="personal_address">Address</label>
                <input type="text" name="address" id="personal_address" value="{{ $user->address }}">
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="personal_number">Phone Number</label>
                <input type="text" name="phone" id="personal_number" value="{{ $user->phone }}">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="personal_email">Email</label>
                <input type="email" id="personal_email" readonly value="{{ $user->email }}">
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="type">Account Type</label>
                <input type="text" id="type" readonly value="@if ($user->type == 2) Agent @else User @endif">
            </div>

            <div class="col-md-6 col-12 mb-30">
                <label for="image">Profile</label>
                <input type="file" name="image" id="image">
            </div>


            <div class="col-12 mb-30"><button type="Submit" class="btn">Save Change</button></div>
        </div>
    </form>
</div>
