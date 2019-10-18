<div class="col-md-4">
    <div class="card shadow-sm">
        <div class="card-header">
            Profile
            <a href="#" class="btn btn-primary btn-sm float-right">Edit</a>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('images/user.png') }}" width="100" class="img-thumbnail"><br>
                <strong>{{ Auth::user()->name }}</strong>
            </div>
            <span class="badge badge-dark mt-2"> Profile Details</span>
            <div class="border p-3">
                <div class="row">
                    <div class="col-md-4">Email:</div>
                    <div class="col-md-6">{{ Auth::user()->email }}</div>

                    <div class="col-md-4">Joined On</div>
                    <div class="col-md-6">{{ Auth::user()->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
