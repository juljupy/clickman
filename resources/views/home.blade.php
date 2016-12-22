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
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Items will be listed in here!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection