@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <div class="container">
                    <h1>{{ $role->fullname }} Role</h1>
                    <p> Name: {{ $role->name }}</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Permissions</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Fullname</th>
                        </thead>
                        <tbody>
                            @forelse ($role->permissions as $permission)
                                <tr>
                                    <td>{{ $permission->fullname }}</td>
                                    <td>{{ $permission->name }}</td>
                                </tr>
                            @empty
                                <tr><td>No permissions found!</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection