@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit user: {{ $user->name }}</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update',$user->id) }}">
                    <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}

                    <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" name="name" class="form-control" placeholder="Enter name here" value="{{ $user->name }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Enter email here" value="{{ $user->email }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ ($errors->has('phonenumber')) ? ' has-error' : '' }}">
                        <label for="phonenumber" class="col-md-4 control-label">Phonenumber</label>

                        <div class="col-md-6">
                            <input id="phonenumber" type="text" name="phonenumber" class="form-control" placeholder="Enter phonenumber here" value="{{ $user->phonenumber }}" required>

                            @if ($errors->has('phonenumber'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phonenumber') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Enter password here">
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Roles</div>

                        <!-- Table -->
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Fullname</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->fullname }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>  
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $role->status }} />
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td>No roles found!</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <a href="{{ url('/users') }}">
                                <button type="button" class="btn btn-danger">
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

       