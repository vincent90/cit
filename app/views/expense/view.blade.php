@extends("layout")
@section("content")

<div class="container">

@if(Session::has('message'))
<div id="dialog-succes" title="Basic dialog">
  <p>{{ Session::get('message') }}</p>
</div>
@endif

<div id="dialog" title="Dialog Title" style="display:none"> Some text</div>

<div class="row">
    <div class="col-md-4"><img src="{{asset('assets/images/CiternesExpert.png')}}" style="width:100%;"></div>
    <div class="col-md-4 col-md-offset-4"><a href = "{{ URL::route("user/logout") }}"class="btn btn-lg btn-primary btn-block btn-flat" type="submit">Logout</button></a></div>

    <div class="row mainContent">
        <div class="col-md-8">
            <table id="tableExpense" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Date</td>
                        <td>Type</td>
                        <td>Description</td>
                        <td>Montant</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($expenses as $key => $value)
                    <tr>
                        <td>{{ $value->date }}</td>
                        <td>{{ $value->categoryId }}</td>
                        <td>{{ $value->comments }}</td>
                        <td>{{number_format( $value->total,2)}}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                            {{ Form::open(array('url' => 'expense/' . $value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Supprimer', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}


                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->

                            <a class="btn btn-small btn-success edit-link" href="{{ URL::to('expense/' . $value->id) }}">Voir</a>

                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <a class="btn btn-small btn-info edit-link" href="{{ URL::to('expense/' . $value->id . '/edit') }}">Modifier</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 rotate" style="background:#2ecc71;height:300px;padding:10px;">
                        <a class="edit-link" href="{{ URL::route("expense/create") }}">
                            <img src="{{asset('assets/images/addExpenses.png')}}" style="width:100%">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 rotate" style="background:#e67e22;height:300px;padding:10px;">
                        <a href="{{ URL::route("user/profile") }}">
                            <img src="{{asset('assets/images/back.png')}}" style="width:100%">
                        </a>
                    </div>
                </div>
            </div>
    </div>
</div>

</div>

@stop
@section("script")
    @parent

    {{HTML::script('js/jquery.tablesorter.min.js')}}
    {{HTML::script('js/jquery.tablesorter.widgets.min.js')}}
    {{HTML::script('js/expense.js')}}
@stop
