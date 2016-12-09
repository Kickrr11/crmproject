@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	{!! Form::open(['url' => 'countryupdate', 'class' => 'form-horizontal']) !!}
	<?=Form::token() ?> 
    <fieldset>
 
        <legend>Edit Country:</legend>
 
        <!-- Email -->
        <div class="form-group">
            {!! Form::label('name', 'Country Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
           
			@if ($errors->first('email'))
				{{ Form::text('email', null, $attributes = array('class'=>'error')) }}
				{{ $errors->first('email', '<small class=error>:message</small>') }}
			@else
				{{ Form::text('name',$value=$country->name,['class' => 'form-control', 'placeholder' => 'Account Name', 'type' => 'text']) }}
			@endif

		   </div>
        </div>
		

 
        <!-- Password -->
        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('description',$value=$country->description,['class' => 'form-control', 'placeholder' => 'Description', 'type' => 'text']) !!}
               
            </div>
        </div>
	
        <!-- Select Multiple -->
		<input type="hidden" name="id" value=<?=$country->id?> >
 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}


@endsection