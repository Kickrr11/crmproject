<!doctype html>

<head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Optional theme -->
	<link rel="stylesheet" href="<?php echo asset('css/index.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo url('css/login.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('bootstrap-wysiwyg-master/index.css')?>" type="text/css">
	<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"> </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<div class="container">

  <div class="row">
	<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
		<div class="panel-heading">
                    <div class="row">
			<div class="col-xs-6">
			
                            {{ HTML::linkRoute('login','Login')}}
			</div>
			<div class="col-xs-6">
                            {{ HTML::linkRoute('registration','Register')}}
			</div>
                    </div>
                    <hr>
		</div>
                <div class="panel-body">

                    <div class="col-lg-12">
			{!! Form::open(['url' => 'regcreate', 'id'=>'login-form']) !!}
			<div class="form-group">
								
                            {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-10">	
                                    <input type="email" name="email" id="username" tabindex="1" class="form-control" placeholder="email" value="">
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
			<div class="form-group">
                            {!! Form::label('password', 'Passrepeat:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
				<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    <p>{{ $errors->first('password') }}</p>
                            </div>
			</div>
			<div class="form-group">
                            {!! Form::label('username', 'Username:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
				{{ Form::text('username',$value=null,['class' => 'form-control', 'placeholder' => 'username', 'type' => 'username'])}}

                            </div>
			</div>
			<div class="form-group">
                            <div class="row">
				<div class="col-lg-12">
                                    <div class="text-center">
					<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                                    </div>
				</div>
                            </div>
			</div>
							
			<div class="form-group">
                            <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
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
		{!! Form::close()!!}

                    </div>
		</div>
            </div>
	</div>
    </div>
</div>
</body>	







