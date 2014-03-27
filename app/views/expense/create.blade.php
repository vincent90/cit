@extends("layout")
@section("content")
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'expense')) }}

	<div class="form-group">
		{{ Form::label('province', 'Province') }}
		{{ Form::text('province', Input::old('province'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('comments', 'Commentaire') }}
		{{ Form::text('comments', Input::old('comments'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('start', 'Départ') }}
		{{ Form::text('start', Input::old('start'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('destination', 'Destination') }}
		{{ Form::text('destination', Input::old('destination'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('kilometers', 'Kilomètrage') }}
		{{ Form::text('kilometers', Input::old('kilometers'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Ajouter la dépense', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop