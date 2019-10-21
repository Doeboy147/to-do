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
                        <img src="{{ asset('images/user.png') }}" width="100" class="img-thumbnail"><br>
                    </div>

                    <form method="post" action="/create-profile" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label> Phone Number</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label> Physical Address</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="address" class="form-control">
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

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="reset" value="Reset" class="btn btn-secondary">
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
