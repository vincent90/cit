@extends("layout")
@section("content")

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<h1>Showing {{ $expense->comments }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $expense->comments }}</h2>
		<p>
			<strong>Province:</strong> {{ $expense->province }}<br>
			<strong>Comments:</strong> {{ $expense->comments }}<br>
			<strong>Start:</strong> {{ $expense->start }}<br>
			<strong>Destination:</strong> {{ $expense->destination }}<br>
			<strong>Kilometers:</strong> {{ $expense->kilometers }}
		</p>
	</div>


@stop