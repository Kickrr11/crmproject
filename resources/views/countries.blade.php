@extends('master')
 
@section('content')
@if (session('status'))
    <div class="alert alert-success">
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
		<th>Priority</th>
		<th>Author </th>
		<th>Actions </th>
		
      </tr>
    </thead>
	<tbody>
         
		 <td>{{ $country->id }} </td>
        
		<td> {{ HTML::linkRoute('countries', $country->name , array($country->id)) }}</td>

		
        <td> {{ $country->created_at }} </td>
		
        
		<td> {{ $country->created_at }}</td>
		<td>   </td>
		<td>{{$country->user->username}} </td>
			
		<td>
			<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
			<?=HTML::decode(link_to_route('countryedit', '<i class="glyphicon glyphicon-edit"></i>', array($country->id), ['class' => 'btn btn-sm btn-success pull-right'])) ?></li>

		</td>
    @endforeach 
    </tbody>
  </table>


{{$countries->links()}}


@endsection