@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="search">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-5">   
                <div class="col-md-6 p-0">
                    <label for="name" class="col-md-6 control-label">First Name</label>

                    <div class="col-md-6 p-0">
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <label for="name" class="col-md-6 control-label">Last Name</label>

                    <div class="col-md-6 p-0">
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-5 p-0">
                <div class="col-md-6 p-0">
                    <label for="email" class="col-md-6 control-label pl-0">E-Mail Address</label>

                    <div class="col-md-6 p-0">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <label for="password-confirm" class="col-md-6 control-label">Role</label>

                    <div class="col-md-6 p-0">
                        <select class="form-control" name="role">
                            <option></option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>               
            <div class="col-md-2 control-label">
                <button type="submit" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-search"></i> Search</button>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('User', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_users')
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            @endcan
        </div>
    </div>

    <div class="result-set">

        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                @can('edit_users', 'delete_users')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles->implode('name', ', ') }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    @can('edit_users')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>

@endsection