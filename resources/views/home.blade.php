@extends('layouts.app')

@section('content')
    <div class="container-fluid" ng-controller="DashCtrl" ng-init="getMyList('{{ Auth::user()->uuid }}')">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-2 shadow-sm">
                    <div class="card-header">
                        MY TO DO
                        <a href="#" data-toggle="modal" data-target="#add-todo"
                           class="btn btn-sm btn-primary float-right"> Add</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @if($todos->count())
                                <div ng-repeat="todo in todos" class="col-md-12 mt-2"> - <% todo.body %> <span
                                        class="badge badge-info" ng-show="todo.status==1"> done </span>
                                    <span class="float-right mt-2">
                                        <button ng-if="!todo.status==1" ng-click="changeStatus(todo.uuid, 1)"
                                                class="btn btn-sm btn-success mr-1"><i
                                                class="fa fa-check"></i> </button>
                                        <button ng-if="todo.status==1" ng-click="changeStatus(todo.uuid, 0)"
                                                class="btn btn-sm btn-warning mr-1"><i
                                                class="fa fa-times"></i> </button>
                                        <a href="/edit-item/<% todo.uuid %>" class="btn btn-sm btn-dark mr-1">Edit</a>
                                        <a href="/delete-item/<% todo.uuid %>" class="btn btn-sm btn-danger mr-1">Delete</a>
                                    </span>
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
            @include('partials.profile')
            @include('partials.add-todo')
        </div>
    </div>
@endsection
