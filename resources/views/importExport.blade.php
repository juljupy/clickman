@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <div class="container">
                    <h1>Import / Export Users</h1>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Import File (XLS, XLSX, CSV): </div>

                <div class="panel-body">
                	@if ($message = Session::get('success'))
						<div class="alert alert-success" role="alert">
							{{ Session::get('success') }}
						</div>
					@endif
					@if ($message = Session::get('error'))
						<div class="alert alert-danger" role="alert">
							{{ Session::get('error') }}
						</div>
					@endif
                    <form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						<input type="file" name="import_file" />
						{{ csrf_field() }}
						<br/>
						<button class="btn btn-primary">Import CSV or Excel File</button>
					</form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Export File: </div>

                <div class="panel-body">	
			    	<a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success btn-lg">Download Excel xls</button></a>
					<a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
					<a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection