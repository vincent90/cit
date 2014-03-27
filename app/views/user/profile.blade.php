@extends("layout")
@section("content")
<!--
    <h2>Bonjour {{ Auth::user()->username }}</h2>
    <p>Bienvenue à votre page de profil.</p>

    <a href="{{ URL::route("expense/view") }}">
        Voir les dépenses
    </a>

    <a href="{{ URL::route("expense/create") }}">
        Ajouter une dépense
    </a>
!-->
    <div class="container">
        <div class="row">
            <div class="col-md-4"><img src="{{asset('assets/images/CiternesExpert.png')}}" style="width:100%;"></div>
            <div class="col-md-4 col-md-offset-4"><a href="{{ URL::route("user/logout") }}" class="btn btn-lg btn-primary btn-block btn-flat" type="submit">Logout</button></a>
        </div>
        <div class="row mainContent">
            <div class="col-md-4 rotate" style="background:#2ecc71;height:300px;padding:10px;"><a href=""><img src="{{asset('assets/images/statistics.png')}}" style="width:100%"></a></div>
            <div class="col-md-4 rotate" style="background:#3498db;height:300px;padding:10px;"><a href="users.html"><img src="{{asset('assets/images/users.png')}}" style="width:100%"></a></div>
            <div class="col-md-4 rotate" style="background:#e74c3c;height:300px;padding:10px;"><a href="{{ URL::route("tax/show") }}"><img src="{{asset('assets/images/tax.png')}}" style="width:100%"></a></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-2 rotate" style="background:#9b59b6;height:300px;padding:10px;"><a href=""><img src="{{asset('assets/images/settings.png')}}" style="width:100%"></a></div>
            <div class="col-md-4 rotate" style="background:#e67e22;height:300px;padding:10px;"><a href=""><img src="{{asset('assets/images/back.png')}}" style="width:100%"></a></div>
        </div>
    </div> <!-- /container -->


@stop