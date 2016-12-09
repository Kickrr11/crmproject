

@extends('master')
 
@section('content')

    <div class="jumbotron">
        <h1></h1>
	
 
        <p>HELOOOOOO!!!!</p>
 
        <p><a class="btn btn-primary btn-lg" href="#" role="button"> HEKK!</a></p>

	
<div class="well">
	
	{!! Form::open(['url' => 'regcreate', 'class' => 'form-horizontal']) !!}
 
    <fieldset>
 
        <legend>Legend</legend>
 
        <!-- Email -->
        <div class="form-group">
            {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
           
			@if ($errors->first('email'))
				{{ Form::text('email', null, $attributes = array('class'=>'error')) }}
				{{ $errors->first('email', '<small class=error>:message</small>') }}
			@else
				{{ Form::email('email',$value=null,['class' => 'form-control', 'placeholder' => 'email', 'type' => 'email']) }}
			@endif

		   </div>
        </div>
		

 
        <!-- Password -->
        <div class="form-group">
            {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'password', 'type' => 'password']) !!}
               
            </div>
        </div>
		
		<div class="form-group">
            {!! Form::label('password', 'Repeatpassword:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'password', 'type' => 'password']) !!}
               
            </div>
        </div>
		
		<div class="form-group">
            {!! Form::label('username', 'Username:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('username',$value=null,['class' => 'form-control', 'placeholder' => 'username', 'type' => 'username'])}}

            </div>
        </div>

 
        <!-- Select Multiple -->

 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}
 
</div>



</div>
@endsection

