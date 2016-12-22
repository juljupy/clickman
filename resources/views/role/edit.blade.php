@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Role: {{ $role->fullname }}</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('roles.update',$role->id) }}">
                    <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}

                    <div class="form-group{{ ($errors->has('fullname')) ? $errors->first('name') : '' }}">
                        <label for="fullname" class="col-md-4 control-label">Fullname</label>

                        <div class="col-md-6">
                            <input id="fullname" type="text" name="fullname" class="form-control" placeholder="Enter fullname here" value="{{ $role->fullname }}">

                            @if ($errors->has('fullname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Enter name here" value="{{ $role->name }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Permissions</div>

                        <!-- Table -->
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Fullname</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->fullname }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>  
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $permission->status }} />
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td>No permissions found!</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <a href="{{ route('roles.index') }}">
                                <button class="btn btn-danger">
                                    Cancel
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

       