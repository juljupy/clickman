@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <div class="container">
                    <h1>Welcome {{ Auth::user()->name }} !!</h1>
                    <p>Enjoy the journey!</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ route('users.show',Auth::user()->id) }}">
                        <button type="button" class="btn btn-success btn-sm">
                            View details
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection