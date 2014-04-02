@extends("layout")
@section("content")
<div class="containerModal">
<h1>Modification de :  {{ $user->username }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}


{{ Form::model($user, array('route' => array('user', $user->id), 'method' => 'PUT')) }}

		<div class="form-group">
    		{{ Form::label('username', 'Nom') }}
    		{{ Form::text('username', null, array('class' => 'form-control', 'required')) }}
    	</div>

    	<div class="form-group">
    		{{ Form::label('email', 'Courriel') }}
    		{{ Form::email('email',  null, array('class' => 'form-control', 'required')) }}
    	</div>

	{{ Form::submit('Modifier l\'usager', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>


@stop