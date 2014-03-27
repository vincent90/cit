@extends("layout")
@section("content")

<h1>Edit {{ $expense->comments }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($expense, array('route' => array('expense', $expense->id), 'method' => 'PUT')) }}

		<div class="form-group">
    		{{ Form::label('province', 'Province') }}
    		{{ Form::text('province', null, array('class' => 'form-control')) }}
    	</div>

    	<div class="form-group">
    		{{ Form::label('comments', 'Commentaire') }}
    		{{ Form::text('comments',  null, array('class' => 'form-control')) }}
    	</div>

    	<div class="form-group">
    		{{ Form::label('start', 'Départ') }}
    		{{ Form::text('start',  null, array('class' => 'form-control')) }}
    	</div>

    	<div class="form-group">
    		{{ Form::label('destination', 'Destination') }}
    		{{ Form::text('destination',  null, array('class' => 'form-control')) }}
    	</div>

    	<div class="form-group">
    		{{ Form::label('kilometers', 'Kilomètrage') }}
    		{{ Form::text('kilometers',  null, array('class' => 'form-control')) }}
    	</div>

	{{ Form::submit('Modifier la dépense', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop