@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	 {{ Form::open(array('route' => array('userupdate', $user->id, ),'files'=>'true','class' => 'form-horizontal')) }} 

		{!!Form::token()!!}
    <fieldset>
 
        <legend>Edit User:</legend>
 
        <!-- Email -->
        <div class="form-group">
            {!! Form::label('name', 'Username:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
           
		@if ($errors->first('email'))
                    {{ Form::text('email', null, $attributes = array('class'=>'error')) }}
                    {{ $errors->first('email', '<small class=error>:message</small>') }}
                @else
            {{ Form::text('username',$value=$user->username,['class' => 'form-control', 'placeholder' => 'Account Name', 'type' => 'text']) }}
		@endif

            </div>
        </div>
		

 
        <!-- Password -->
        <div class="form-group">
            {!! Form::label('email', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('email',$value=$user->email,['class' => 'form-control', 'placeholder' => 'Description', 'type' => 'text']) !!}
               
            </div>
        </div>
		
	<div class="form-group">
            {!! Form::label('pic', 'Picture:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
				{{$user->pic}}
               {{Form::file('pic')}}
            </div>
        </div>
	
        <!-- Select Multiple -->
	<input type="hidden" name="id" value=<?=$user->id?> >
 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}


@endsection