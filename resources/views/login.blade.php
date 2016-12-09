<!doctype html>

<head>

<link rel="stylesheet" href="<?php echo url('css/login.css')?>" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
@extends('master')
 
@section('content')

  <div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
			
					<?php echo link_to('login','Login');?>
					</div>
					<div class="col-xs-6">
						<?php echo link_to('registration','Register');?>
					</div>
				</div>
				<hr>
			</div>
			<div class="panel-body">

					<div class="col-lg-12">
						<form  id="login-form" role="form" style="display: block;" <?=Form::open(array('route'=>'logged'))?>
							<div class="form-group">
								
							{!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
							<div class="col-lg-10">	
								<input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
								<p>{{ $errors->first('email') }}</p>
							</div>
							</div>
							<div class="form-group">
							{!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
							<div class="col-lg-10">
								<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
								<p>{{ $errors->first('password') }}</p>
							</div>
							</div>
							<div class="form-group text-center">
								<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
								<label for="remember"> Remember Me</label>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<div class="text-center">
											<a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
									@if ($error = $errors->first('password'))
								<div class="alert alert-danger">
									{{ $error }}
								</div>
								@endif
			
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
 
    <div class="jumbotron">
        <h1></h1>
 
        <p>HELOOOOOO!!!!</p>
 
        <p><a class="btn btn-primary btn-lg" href="#" role="button"> HEKK!</a></p>


<div class="well">



    {!! Form::open(['url' => 'logged', 'class' => 'form-horizontal']) !!}
 
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
			  {{ Form::text('email') }}
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
 
  
 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}
 
</div>

@endsection