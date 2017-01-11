@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	 {{ Form::open(array('route' => array('contupdate', $contact->id),'class' => 'form-horizontal')) }} 

	<?=Form::token() ?> 
    <fieldset>
 
        <legend>Edit Contact:</legend>
 
        <!-- Email -->
        <div class="form-group">
            {!! Form::label('name', 'Contact Firstname:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
           
			@if ($errors->first('email'))
				{{ Form::text('email', null, $attributes = array('class'=>'error')) }}
				{{ $errors->first('email', '<small class=error>:message</small>') }}
			@else
				{{ Form::text('firstname',$value=$contact->firstname,['class' => 'form-control', 'placeholder' => 'Account Name', 'type' => 'text']) }}
			@endif

		   </div>
        </div>
		

 
        <!-- Password -->
        <div class="form-group">
            {!! Form::label('lastname', 'Lastname:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('lastname',$value=$contact->firstname,['class' => 'form-control', 'placeholder' => 'Description', 'type' => 'text']) !!}
               
            </div>
        </div>
		

		
		<div class="form-group">
            {!! Form::label('Email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('email',$value=$contact->firstname,['class' => 'form-control', 'placeholder' => 'street', 'type' => 'email'])}}

            </div>
        </div>
		
		<div class="form-group">
            {!! Form::label('Skype', 'Skype:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('skype',$value=$contact->skype,['class' => 'form-control', 'placeholder' => 'city', 'type' => 'text'])}}

            </div>
        </div>
		
		<div class="form-group">
            {!! Form::label('Phone', 'Phone:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('phone',$value=$contact->skype,['class' => 'form-control', 'placeholder' => 'country', 'type' => 'text'])}}

            </div>
        </div>
		
		<div class="form-group">
            {!! Form::label('Company', 'Company:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('company',$value=$contact->company,['class' => 'form-control', 'placeholder' => 'zip', 'type' => 'text'])}}

            </div>
        </div>
		
		<div class="form-group">
            {!! Form::label('Phone', 'Phone:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('phone',$value=$contact->phone,['class' => 'form-control', 'placeholder' => 'phone', 'type' => 'text'])}}

            </div>
        </div>


 
        <!-- Select Multiple -->
		<input type="hidden" name="id" value=<?=$contact->id?> >
 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}


@endsection