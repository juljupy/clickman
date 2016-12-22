@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>System Roles</h2>
            <p>
                <a href="{{ route('roles.create') }}">
                    <button type="button" class="btn btn-success btn-sm">
                        Create
                    </button>
                </a>
            </p>
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">System Roles</div>

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
                                    <a href="{{ route('roles.show',$role->id) }}">
                                        <button type="button" class="btn btn-success btn-sm">
                                            View
                                        </button>
                                    </a>
                                    <a href="{{ route('roles.edit',$role->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Edit
                                        </button>
                                    </a>
                                    <a>
                                        <form style="display: inline;" action="{{route('roles.destroy',$role->id)}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" onclick="return confirm('Are you sure to delete this role?');" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td>No roles found!</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection