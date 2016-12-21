@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


      @foreach ($accounts as $account)
		<table class="table table-striped">
		
   
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
		<td>{{$account->user->username}} </td>
			
		
		<td>{!!HTML::decode(link_to_route('accountedit', '<i class="glyphicon glyphicon-edit"></i>', array($account->id), ['class' => 'btn btn-sm btn-success '])) !!}</td>

		
    @endforeach 
    </tbody>
  </table>


{{$accounts->links()}}

@endsection