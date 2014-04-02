@extends("layout")
@section("content")

@if(Session::has('message'))
<div id="dialog" title="Basic dialog">
  <p>{{ Session::get('message') }}</p>
</div>
@endif

<div class="row">
    <div class="col-md-4"><img src="{{asset('assets/images/CiternesExpert.png')}}" style="width:100%;"></div>
    <div class="col-md-4 col-md-offset-4"><a href = "{{ URL::route("user/logout") }}"class="btn btn-lg btn-primary btn-block btn-flat" type="submit">Logout</button></a></div>

    <div class="row mainContent">
        <div class="col-md-8">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Courriel</td>
                        <td>Role</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $value)
                    <tr>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->role }}</td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                            {{ Form::open(array('url' => 'user/' . $value->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Supprimer', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                            <!--
                                <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id) }}">Voir</a>
                            !-->
                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Modifier</a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        {{ Form::open(array('url' => 'user/create')) }}
                        <td>{{ Form::text('username',  null, array('class' => 'form-control')) }}</td>
                        <td>{{ Form::text('email',  null, array('class' => 'form-control')) }}</td>
                        <td>{{ Form::text('role',  null, array('class' => 'form-control')) }}</td>
                        <td>{{ Form::submit('Créer utilisateur', array('class' => 'btn btn-primary')) }}</td>
                        {{ Form::close() }}
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 rotate" style="background:#e67e22;height:300px;padding:10px;">
            <a href="{{ URL::route("user/profile") }}">
                <img src="{{asset('assets/images/back.png')}}" style="width:100%">
            </a>
        </div>
    </div>
</div>

@stop
