@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> Something went wrong</div>

                    <div class="card-body">
                        <div class="alert alert-danger text-center">
                            {{ $message }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
