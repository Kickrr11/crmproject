
@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	
	{!! Form::open(['url' => 'accountcreate', 'class' => 'form-horizontal']) !!}
 
    <fieldset>
 
        <legend>Add a new account:</legend>
 
        <!-- Email -->
        <div class="form-group">
            {!! Form::label('name', 'Account Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
           
		@if ($errors->first('name'))
		{{ Form::text('name', null, $attributes = array('class'=>'form-control')) }}
		{{ $errors->first('name') }}
		@else
		{{ Form::text('name',$value=null,['class' => 'form-control', 'placeholder' => 'Account Name', 'type' => 'text']) }}
		@endif

            </div>
        </div>
		

 
        <!-- Password -->
        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('description',$value=null,['class' => 'form-control', 'placeholder' => 'Description', 'type' => 'text']) !!}
                    {{$errors->first('description')}}
            </div>
        </div>
		
	<div class="form-group">
            {!! Form::label('street', 'Street:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('street',$value=null,['class' => 'form-control', 'placeholder' => 'Street', 'type' => 'text']) !!}
                    {{$errors->first('street')}}
            </div>
	</div>	
		
	<div class="form-group">
            {!! Form::label('city', 'City:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('city',$value=null,['class' => 'form-control', 'placeholder' => 'City', 'type' => 'text']) !!}
                    {{$errors->first('city')}}
            </div>
	</div>	
		
	<div class="form-group">
            {!! Form::label('country', 'Country:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('country',$value=null,['class' => 'form-control', 'placeholder' => 'Country', 'type' => 'text']) !!}
                    {{$errors->first('country')}}
            </div>
	</div>	
		
	<div class="form-group">
            {!! Form::label('zip', 'Zip:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('zip',$value=null,['class' => 'form-control', 'placeholder' => 'Zip', 'type' => 'text']) !!}
                    {{$errors->first('zip')}}
            </div>
	</div>	
		
				
	<div class="form-group">
            {!! Form::label('phone', 'Phone:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('phone',$value=null,['class' => 'form-control', 'placeholder' => 'Phone', 'type' => 'text']) !!}
                    {{$errors->first('phone')}}
            </div>
	</div>	

	<div class="form-group">
            {!! Form::label('country', 'Country:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
		<select class="form-control" name="country_id">
		@foreach($country as $countries)
                    <option value="{{$countries->id}}">{{$countries->name}}</option>
		@endforeach
                </select>
            </div>

	</div>
		
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