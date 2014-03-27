@extends("layout")
@section("content")
<h1>Liste des dépenses.</h1>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Commentaire</td>
			<td>Début</td>
			<td>Fin</td>
			<td>Kilomètrage</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($expenses as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->province }}</td>
			<td>{{ $value->comments }}</td>
			<td>{{ $value->start }}</td>
			<td>{{ $value->destination }}</td>
			<td>{{ $value->kilometers }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

		        {{ Form::open(array('url' => 'expense/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Supprimer', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}


		        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('expense/' . $value->id) }}">Voir</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('expense/' . $value->id . '/edit') }}">Modifier</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

@stop