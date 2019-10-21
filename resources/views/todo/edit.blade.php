@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> Edit Item</div>

                    <div class="card-body">
                        <form method="post" action="/update-item/{{ $item->uuid }}">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label> Todo</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea  name="body" class="form-control">{{ $item->body }} </textarea>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
