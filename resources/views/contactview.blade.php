@extends('master')
 
@section('content')


    <div class="row">

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Contact Info:</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://pixabay.com/static/uploads/photo/2013/07/13/12/07/avatar-159236_960_720.png"style="width:100px; height:100px;" > </div>

					<div class=" col-md-9 col-lg-9 "> 
						<table class="table table-user-information">
							<tbody>
					
					<tr>
                        <td>#</td>
                        <td>{{$contact->id}}</td>
                      </tr>
					
                    <tr>
                        <td>Firstname</td>
                        <td>{{$contact->firstname}}</td>
                    </tr>
                    <tr>
                        <td>Last Name </td>
                        <td>{{$contact->lastname}}</td>
                    </tr>
                    <tr>
                        <td>Created at</td>
                        <td>{{$contact->created_at}}</td>
                    </tr>
					<tr>
                        <td>Added by user</td>
                        <td> <p>{{ HTML::linkRoute('contview', $contact->user->username, array($contact->user_id)) }}</p>
						</td>
                    </tr>
					
					<tr>
                        <td>Account</td>
                        <td> <p>{{ HTML::linkRoute('accounts', $contact->account->name, array($contact->account_id)) }}</p>
						</td>
                    </tr>
					
					<tr>
                        <td>Skype</td>
                        <td>{{$contact->skype}}</td>
                    </tr>
					  
					<tr>
                        <td>Company</td>
                        <td>{{$contact->company}}</td>
                    </tr>
					  
					<tr>
                        <td>Position</td>
                        <td>{{$contact->position}}</td>
                    </tr>
                   
                    <tr>
                        
                    <tr>
						<td>Address</td>
                        <td>{{$contact->address}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$contact->email}}</a></td>
                    </tr>
					  
					<tr>
                        <td>Added by</td>
                        <td></a></td>
                    </tr>
					  
					  
						<td>Phone Number</td>
						<td>{{$contact->phone}}</td>
                        
                           
                    </tr>
                     
                    </tbody>
                  </table>
                  

                </div>
              </div>
            </div>
				<div class="panel-footer">
                 
						
					<a type="button" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#myModal">
							<i class="glyphicon glyphicon-remove"></i>
					</a> 
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        </span>
                </div>
            
          </div>
        </div>
      </div>
	  
	  <!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this contact?</h4>
			</div>
				<div class="modal-body">
					{!! Form::open(['url' => 'contdel', 'class' => 'elegant-aero']) !!}
					
						<?=Form::token() ?> 
		
						{{ Form::hidden('contactid',$value=$contact->id) }}
						
						<button type="submit" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  
				</div>
	
			</div>
			<div class="modal-footer">
			
			</div>
				 
		</div>
  </div>
   {!! Form::close()  !!}

<!--END MODAL -->





@endsection