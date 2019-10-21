@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center"> Profile</h2>

                <div class="card">
                    <div class="card-header"> Edit your profile</div>

                    <div class="card-body">
                        <div class="text-center mb-3">
                            Current profile picture<br>
                            <img src="{{ $profile->getImageUrl() }}" width="100" class="img-thumbnail"><br>
                        </div>

                        <form method="post" action="/update-profile/{{ $profile->uuid }}" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label> Phone Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $profile->phone_number }}" name="phone_number"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label> Physical Address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $profile->address }}" name="address"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label> Profile Picture</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="profilePic" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="profile_pic" value="{{ $profile->profile_pic }}">

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <a href="/home" class="btn btn-secondary"> Go Back</a>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="Submit" class="btn btn-secondary float-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
