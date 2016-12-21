@extends('master')
 
@section('content')


	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">{{$country->name}}</h3>
  
		</div>
		
		
	</div>

    <div class="row">
	
	
		<div class=".col-xs-3 .col-sm-4 ">
			<div class="picture">
			</div>
		</div>
	
		<div class=".col-xs-3 .col-sm-4">
		
		</div>
	  

	
	
	</div>
    
    
     <h3> Accounts for this country </h3>
	<table class="table table-striped">
		
	   @foreach ($account as $accounts) 
		<thead>
		
		  <tr>
			<th>#</th>
			<th>IssueName</th>
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