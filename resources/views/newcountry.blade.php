
@extends('master')
 
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	
	{!! Form::open(['url' => 'countrycreate', 'class' => 'form-horizontal']) !!}
 
    <fieldset>
 
        <legend>Add a new country:</legend>
 
        <!-- Email -->
        <div class="form-group">
            {!! Form::label('name', 'Country Name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
           
		@if ($errors->first('name'))
		{{ Form::text('name', null, $attributes = array('class'=>'form-control')) }}
		{{ $errors->first('name') }}
		@else
                {{ Form::text('name',$value=null,['class' => 'form-control', 'placeholder' => 'Country Name', 'type' => 'text']) }}
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
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>

    </fieldset>
 
    {!! Form::close()  !!}
 
</div>

</div>
@endsection