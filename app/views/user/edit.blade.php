@extends("layout")
@section("content")

<h1>Edit {{ $user->username }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('user', $user->id), 'method' => 'PUT')) }}

		<div class="form-group">
    		{{ Form::label('username', 'Nom') }}
    		{{ Form::text('username', null, array('class' => 'form-control')) }}
    	</div>

    	<div class="form-group">
    		{{ Form::label('email', 'Courriel') }}
    		{{ Form::text('email',  null, array('class' => 'form-control')) }}
    	</div>

	{{ Form::submit('Modifier l usager', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop