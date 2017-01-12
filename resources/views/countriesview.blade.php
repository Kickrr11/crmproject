@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
		<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" style="color:white">×</span></button>
        {{ session('status') }}
    </div>
@endif

    <div class="panel panel-info">
	<div class="panel-heading">
            <h3 class="panel-title">{{$country->name}}</h3>
  
	</div>
		
		
    </div>

    
    
        <h3> Accounts for this country </h3>
    <table class="table table-striped">
		
	@foreach ($account as $accounts) 
	<thead>
		
            <tr>
		<th>#</th>
		<th>AccountName</th>
		<th>CreatedAt</th>
		<th>Last Updated</th>
		<th>Author</th>
			
            </tr>
	</thead>
	<tbody>
	
            <td> {{ $accounts->id }}</td>
            <td> {{ HTML::linkRoute('accounts', $accounts->name , array($accounts->id)) }}</td>
            <td> {{$accounts->created_at}}</td>
	
            <td>{{$accounts->updated_at}}</td>
            <td>{{ HTML::linkRoute('accounts', $accounts->user->username , array($accounts->id)) }}
            </td>
	
	</tbody>
		@endforeach
    </table>
	 
@endsection