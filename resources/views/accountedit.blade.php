@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	 {{ Form::open(array('route' => array('accountupdate', $account->id),'class' => 'form-horizontal')) }} 

	<?=Form::token() ?> 
    <fieldset>
 
        <legend>Edit Account:</legend>
 
        <!-- Email -->
        <div class="form-group">
            {!! Form::label('name', 'Account Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
           
			@if ($errors->first('email'))
				{{ Form::text('email', null, $attributes = array('class'=>'error')) }}
				{{ $errors->first('email', '<small class=error>:message</small>') }}
			@else
				{{ Form::text('name',$value=$account->name,['class' => 'form-control', 'placeholder' => 'Account Name', 'type' => 'text']) }}
			@endif

		   </div>
        </div>
		

 
        <!-- Password -->
        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('description',$value=$account->name,['class' => 'form-control', 'placeholder' => 'Description', 'type' => 'text']) !!}
               
            </div>
        </div>
		

		
	<div class="form-group">
            {!! Form::label('Street', 'Street:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('street',$value=$account->street,['class' => 'form-control', 'placeholder' => 'street', 'type' => 'text'])}}

            </div>
        </div>
		
	<div class="form-group">
            {!! Form::label('City', 'City:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('city',$value=$account->city,['class' => 'form-control', 'placeholder' => 'city', 'type' => 'text'])}}

            </div>
        </div>
		
	<div class="form-group">
            {!! Form::label('Country', 'Country:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('country',$value=$account->country,['class' => 'form-control', 'placeholder' => 'country', 'type' => 'text'])}}

            </div>
        </div>
		
	<div class="form-group">
            {!! Form::label('Zip', 'Zip:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('zip',$value=$account->zip,['class' => 'form-control', 'placeholder' => 'zip', 'type' => 'text'])}}

            </div>
        </div>
		
	<div class="form-group">
            {!! Form::label('Phone', 'Phone:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
               {{ Form::text('phone',$value=$account->phone,['class' => 'form-control', 'placeholder' => 'phone', 'type' => 'text'])}}

            </div>
        </div>


 
        <!-- Select Multiple -->
		<input type="hidden" name="id" value=<?=$account->id?> >
 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}


@endsection