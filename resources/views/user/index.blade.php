@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>System Users</h2>
            <p>
                <a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-success btn-sm">
                        Create
                    </button>
                </a>
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
                                    @can('view_user')
                                        <a href="{{ route('users.show',$user->id) }}">
                                            <button type="button" class="btn btn-success btn-sm">
                                                View
                                            </button>
                                        </a>
                                    @endcan
                                    @can('edit_user')
                                        <a href="{{ route('users.edit',$user->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                Edit
                                            </button>
                                        </a>
                                    @endcan
                                    @can('delete_user')
                                        <a>
                                            <form style="display: inline;" action="{{route('users.destroy',$user->id)}}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Are you sure to delete this user?');" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </a>
                                    @endcan
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