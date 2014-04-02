@extends("layout")
@section("content")

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<h1>Visualisation de la dépense :  {{ $expense->comments }}</h1>

	<div class="jumbotron text-center">
		<p>
			<strong>Date:</strong> {{ $expense->date }}<br>
			<strong>Type:</strong> {{ $expense->categoryId }}<br>
			<strong>Description:</strong> {{ $expense->comments }}<br>
			<strong>Montant:</strong> {{ $expense->total }}<br>
		</p>
	</div>


@stop