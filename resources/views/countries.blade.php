@extends('master')
 
@section('content')
@if (session('status'))
    <div class="alert alert-success">
		<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" style="color:white">×</span></button>
        {{ session('status') }}
    </div>
@endif

      @foreach ($countries as $country)
		<table class="table table-striped">
		
   
	<thead>
	
      <tr>
		<th>#</th>
        <th>CountryName</th>
        
        <th>CreatedAt</th>
		<th>Last Updated</th>
		<th>Author </th>
		<th>Actions </th>
		
      </tr>
    </thead>
	<tbody>
         
		<td>{{ $country->id }} </td>
        
		<td> {!! HTML::linkRoute('countries', $country->name , array($country->id)) !!}</td>

		
        <td> {{ $country->created_at }} </td>
		
        
		<td> {{ $country->created_at }}</td>
		
		<td>{{ HTML::linkRoute('users', $country->user->username, array($country->user->id)) }}</td>
			
		<td>
			{!!HTML::decode(link_to_route('countryedit', '<i class="glyphicon glyphicon-edit"></i>', array($country->id), ['class' => 'btn btn-sm btn-success ']))!!}

		</td>
    @endforeach 
    </tbody>
  </table>


{{$countries->links()}}


@endsection