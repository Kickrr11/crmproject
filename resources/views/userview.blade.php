@extends('master')
 
@section('content')

    <div class="row">

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

            <div class="panel panel-info">
		<div class="panel-heading">
                    <h3 class="panel-title">{{$user->username }}</h3>
		</div>
                <div class="panel-body">
                    <div class="row">
		
			@if ($user->pic)
                            <div class="col-md-3 col-lg-3 " align="center">
				<img src='{{ asset($user->pic) }}'style="width:100px; height:100px;"></div>
			@else
                            <div class="col-md-3 col-lg-3 " align="center">
				<img alt="User Pic" src="https://pixabay.com/static/uploads/photo/2013/07/13/12/07/avatar-159236_960_720.png"style="width:100px; height:100px;" > </div>
			@endif
			<div class=" col-md-9 col-lg-9 "> 
                            <table class="table table-user-information">
				<tbody>
                                    <tr>
					<td>Department:</td>
					<td>Programming</td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>Home Address</td>
					<td>Sofia,BG</td>
                                    </tr>
                                    <tr>
					<td>Email</td>
					<td>{{$user->email }}</a></td>
                                    </tr>
		   
                                     </tr>
						 
				</tbody>
                            </table>
					  
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                 
                </div>
            
          </div>
        </div>
    </div>
	  
    @endsection