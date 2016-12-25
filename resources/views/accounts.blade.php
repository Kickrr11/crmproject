@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
		<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" style="color:white">×</span></button>
        {{ session('status') }}
    </div>
@endif


      
		<table class="table table-striped">
		@foreach ($accounts as $account)
   
	<thead>
	
      <tr>
		<th>#</th>
        <th>AccountName</th>
        
        <th>CreatedAt</th>
		<th>Last Updated</th>
		<th>Country</th>
		<th>Author </th>
		<th>Actions </th>
		
      </tr>
    </thead>
	<tbody>
         
		 <td>{{ $account->id }} </td>
        
		<td> {{ HTML::linkRoute('accounts', $account->name , array($account->id)) }}</td>

		
        <td> {{ $account->created_at }} </td>
		
        
		<td> {{ $account->created_at }}</td>
		<td> {{ HTML::linkRoute('countries', $account->countries->name, array($account->countries->id)) }} </td>
		<td>{{ HTML::linkRoute('users', $account->user->username, array($account->user->id)) }} </td>
			
		
		<td>{!!HTML::decode(link_to_route('accountedit', '<i class="glyphicon glyphicon-edit"></i>', array($account->id), ['class' => 'btn btn-sm btn-success '])) !!}</td>

    @endforeach 
    </tbody>
  </table>


{{$accounts->links()}}

@endsection