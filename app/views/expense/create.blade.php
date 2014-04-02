@extends("layout")
@section("content")
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'expense')) }}



	<div class="form-group">
		{{ Form::label('categoryId', 'Type') }}
		{{ Form::text('categoryId', Input::old('type'), array('class' => 'form-control','required')) }}
	</div>
<div class="form-group">
    {{ Form::label('date', 'Date') }}
    {{ Form::text('date', Input::old('date'), array('class' => 'form-control datepicker','required','data-date-format' => 'yyyy/mm/dd')) }}
</div>
	<div class="form-group">
		{{ Form::label('comments', 'Description') }}
		{{ Form::text('comments', Input::old('comments'), array('class' => 'form-control','required')) }}
	</div>

	<div class="form-group">
		{{ Form::label('total', 'Montant') }}
		{{ Form::text('total', Input::old('total'), array('class' => 'form-control','required')) }}
	</div>


	{{ Form::submit('Ajouter la dépense', array('class' => 'btn btn-primary','required')) }}

{{ Form::close() }}

@stop

@section("script")
    @parent
    {{HTML::script('js/expense.js')}}
@stop
