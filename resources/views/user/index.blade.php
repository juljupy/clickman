@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>System Users</h2>
            <p>
                <div class="btn btn-success" role="group" aria-label="create user">Create</div>
            </p>
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">System Users</div>

                <!-- Table -->
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>email</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ url('/users/'.$user->id.'/edit') }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Edit
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr><td>No users found!</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection