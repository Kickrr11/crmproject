@extends('master')
 
@section('content')

	<div class="panel panel-info">
	  <div class="panel-heading">
        <h3 class="panel-title">Account:{{$account->name}} </h3>

      </div>
	</div>
	 

	<button type="button" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#myModal">
	<i class="glyphicon glyphicon-remove"></i>
	</button> 
	
		{!!HTML::decode(link_to_route('accountedit', '<i class="glyphicon glyphicon-edit"></i>', array($account->id), ['class' => 'btn btn-sm btn-success pull-right']))!!}</li>


<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this account?</h4>
			</div>
				<div class="modal-body">
					<form class="elegant-aero"
		
		
						{{ Form::hidden('accountid', $account->id) }}
						<button type="submiy" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  
				</div>
	
			</div>
			<div class="modal-footer">
			
			</div>
					</form>
		</div>
  </div>

<!--END MODAL -->
     <table class="table table-user-information">
       <tbody>
					
		<tr>
          <td>Account #:</td>
            <td>{{$account->id}}</td>

        </tr>
					
		<tr>
            <td>Account name:</td>
            <td>{{$account->name}}</td>
        </tr>
        <tr>
  
			<td>Account  added by user:</td>
            <td><p>{{ HTML::linkRoute('users', $account->user->username, array($account->user->id)) }}</p></td>

            </tr>

        <tr>
            <td>Account created at:</td>
            <td>{{$account->created_at}}</td>
        </tr>
					 
        <tr>
            <td>Account updated at:</td>
             <td>{{$account->created_at}}</td>
        </tr>
                   
        <tr>
						 
			<tr>
              <td>Street:</td>
              
			  <td>{{$account->street}}</td>
    
			</tr>
              
			<tr>
             
			  <td>City:</td>

              <td> {{$account->city}} </td>

			  </tr>
              
			<tr>
				<td>Country address:</td>

              <td>{{$account->country}}</td>

			</tr>
              
			<tr>
              
			  <td>Zip: </td>
			 
              <td>{{$account->zip}}</a>  </td>

			 </tr>
			 
			 <tr>
              
			  <td>Country: </td>
			        <td><p>{{ HTML::linkRoute('countries', $account->countries->name, array($account->countries->id)) }}</p></td>

			 </tr>
			 
              <td>Phone Number:</td>
			  
			  
              <td> {{$account->phone}} </td>
             
			<tr>
			<td>Contacts for this account</td>
			
            <td>	@foreach ($contact as $contacts)
				<p>{{ HTML::linkRoute('contview', $contacts->firstname, array($contacts->id)) }}</p>

				@endforeach
			</td>
          </tr> 

		<tr>
         <td>Description</td>

         <td>{{$account->text}} </td>

		 </tr>
					  
        </tr>
                     
       </tbody>
      </table>

	 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg">
		<i class="fa fa-plus"></i> Add a contact
	</button>

	<!-- Modal -->
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add a contact</h4>
		  </div>
		  <div class="modal-body">
		  {!! Form::open(['url' => 'contcreate', 'class' => 'elegant-aero']) !!}		
			
		
		
		<div class="form-group">
		  
		  <label for="title">Firstname</label>
		  	{{ Form::text('firstname',$value=null,['class' => 'form-control','placeholder' => 'firstname', 'type' => 'text'])}}

		  </div>
			
		<div class="form-group">
		  <label for="title">Lastname</label>
			{{ Form::text('lastname',$value=null,['class' => 'form-control','placeholder' => 'lastname', 'type' => 'text'])}}

		 </div>
		 
		 <div class="form-group">
		  <label for="title">Phone</label>
			{{ Form::text('phone',$value=null,['class' => 'form-control','placeholder' => 'phone', 'type' => 'text'])}}

		</div>
		
		<div class="form-group">
		  <label for="title">Email</label>
			{{ Form::email('email',$value=null,['class' => 'form-control','placeholder' => 'email', 'type' => 'email'])}}

		</div>
		
		<div class="form-group">
		  <label for="title">Skype</label>
			{{ Form::text('skype',$value=null,['class' => 'form-control','placeholder' => 'skype', 'type' => 'text'])}}

		</div>	

		<div class="form-group">
		  <label for="title">Company</label>
		  	{{ Form::text('company',$value=null,['class' => 'form-control','placeholder' => 'company', 'type' => 'text'])}}

		</div>
		
		<div class="form-group">
		  <label for="title">Company</label>
		  	{{ Form::text('position',$value=null,['class' => 'form-control','placeholder' => 'position', 'type' => 'text'])}}

		</div>

		{{ Form::hidden('accountid', $account->id) }}

		{!! Form::submit('Submit', ['class' => 'btn btn-primary'] ) !!}
		 
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		   
		  </div>
		
		  </div>
		  <div class="modal-footer">
		   
		</div>
	  </div>
	  {!! Form::close()  !!}
	</div> <!--END MODAL -->

	{!! Form::open(['url' => 'notecreate', 'files'=>'true','class' => 'elegant-aero']) !!}		

	<h4>Add a note: </h4>
	 
	{{ Form::textarea('description',$value=null,['class' => 'form-control', 'id'=> 'some-textarea','placeholder' => 'Enter text ...', 'type' => 'text'])}}
	

 
	{{ Form::hidden('accountid', $account->id) }}
	 {!! Form::submit('Submit', ['class' => 'btn btn-primary'] ) !!}
	
	
	</form>
	

	
	   </br>
	   </br>

	<div class="row">
		<div class="col-sm-12">
		<h3>Notes:</h3>
		@foreach ($note as $notes)
		</div><!-- /col-sm-12 -->
	</div><!-- /row -->

	<div class="row">

	<div class="col-sm-1">

		<div class="thumbnail">
		<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
		</div><!-- /thumbnail -->
	</div><!-- /col-sm-1 -->

	<div class="col-sm-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong> <p>User:{{ HTML::linkRoute('users', $notes->user->username, array($notes->user->id)) }}</p></strong> <span class="text-muted">{{ $notes->created_at}}</span>
				
			</div>
			<div class="panel-body">
			{!!$notes->description!!}
			
			</div><!-- /panel-body -->
		</div><!-- /panel panel-default -->
	
	@endforeach
	
	{{$note->links()}}
	</div><!-- /col-sm-5 -->
 	

<script>tinymce.init({ selector:'textarea' });</script>	
<script type="text/javascript">
$('#some-textarea').wysiwyg();
$('#some-textarea').wysiwyg({
	"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
	"emphasis": true, //Italics, bold, etc. Default true
	"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
	"html": false, //Button which allows you to edit the generated HTML. Default false
	"link": true, //Button to insert a link. Default true
	"image": true, //Button to insert an image. Default true,
	"color": false //Button to change color of font  
});
	</script>
	
@endsection 
   