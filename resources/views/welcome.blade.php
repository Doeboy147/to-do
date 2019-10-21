@extends('layouts.app')
@section('content')
    <div class="container-fluid" ng-controller="MainCtrl" ng-init="getall()">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center"> To Do List</h3>
                <div class="card">
                    <div class="card-header"> Available list</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <input type="text" ng-keyUp="search(query)" ng-model="query" class="form-control"
                                       placeholder="Search">
                            </div>
                            <div class="row">
                                @if($todos->count())
                                    <div ng-repeat="todo in todos" class="col-md-12 mt-2">
                                       - <% todo.body %>
                                        <span
                                            class="badge badge-info" ng-show="todo.status==1"> done </span>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            There's nothing on your list
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
