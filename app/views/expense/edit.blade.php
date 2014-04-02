@extends("layout")
@section("content")

<h1>Edit {{ $expense->comments }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($expense, array('route' => array('expense', $expense->id), 'method' => 'PUT')) }}



    	<div class="form-group">
    		{{ Form::label('categoryId', 'Type') }}
    		<!--{{ Form::text('categoryId',  null, array('class' => 'form-control','required')) }} !-->
            {{ Form::select('categoryId',   array('Mileage' => 'Mileage', 'Food' => 'Food', 'Travel' => 'Travel'),null, array('class' => 'form-control','required')) }}
    	</div>
        <div class="form-group">
            {{ Form::label('date', 'Date') }}
            {{ Form::text('date', null, array('class' => 'form-control','required')) }}
        </div>
    	<div class="form-group">
    		{{ Form::label('comments', 'Description') }}
    		{{ Form::text('comments',  null, array('class' => 'form-control','required')) }}
    	</div>

    	<div class="form-group">
    		{{ Form::label('total', 'Montant') }}
    		{{ Form::text('total',  null, array('class' => 'form-control','required')) }}
    	</div>


	{{ Form::submit('Modifier la dépense', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop