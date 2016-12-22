@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <div class="container">
                    <h1>{{ $user->name }} User</h1>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Details</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Email</th>
                            <th>Phonenumber</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phonenumber }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <table class="table">
                        <thead>
                            <th>Role</th>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($user->roles as $role)
                                    <tr>
                                        <td>{{ $role->fullname }}</td>
                                    </tr>
                                @empty
                                    <tr><td>No roles found!</td></tr>
                                @endforelse
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection