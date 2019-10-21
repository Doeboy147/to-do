<div class="col-md-4">
    <div class="card shadow-sm">
        <div class="card-header">
            Profile
            @if(empty($profile) == false)
                <a href="/show-profile" class="btn btn-primary btn-sm float-right">Update</a>
            @else
                <a href="/edit-profile" class="btn btn-primary btn-sm float-right">Edit</a>
            @endif
        </div>
        <div class="card-body">
            <div class="text-center">
                @if(empty($profile->profile_pic) == true)
                    <img src="{{ asset('images/user.png') }}" width="100" class="img-thumbnail"><br>
                    <strong>{{ Auth::user()->name }}</strong>
                @else
                    <img src="{{ $profile->getImageUrl() }}" width="100" class="img-thumbnail"><br>
                    <strong>{{ Auth::user()->name }}</strong>
                @endif
            </div>
            <span class="badge badge-dark mt-2"> Profile Details</span>
            <div class="border p-3">
                <div class="row">
                    <div class="col-md-4">Email:</div>
                    <div class="col-md-6">{{ Auth::user()->email }}</div>

                    <div class="col-md-4">Physical Address:</div>
                    @if(empty($profile) ==false)
                        <div class="col-md-6">{{ $profile->address }}</div>

                        <div class="col-md-4">Phone Number:</div>
                        <div class="col-md-6">{{ $profile->phone_number }}</div>
                    @endif

                    <div class="col-md-4">Joined On</div>
                    <div class="col-md-6">{{ Auth::user()->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
