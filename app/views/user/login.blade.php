@extends("layout")
@section("content")
<div class="container">
    {{ Form::open([
        "route"        => "user/login",
        "autocomplete" => "off",
        "class" => "form-signin",
        "url" => " "
    ]) }}

    <!--<h2 class="form-signin-heading">{{Lang::get('messages.LOGIN_WELCOME')}}</h2>!-->


    <h2 class="form-signin-heading"><img src="{{asset('assets/images/CiternesExpert.png')}}" style="width:100%;"></h2>
    {{ Form::text("username", Input::get("username"), array('class' => 'form-control', "placeholder" => Lang::get('messages.LOGIN_USERNAME'))) }}
    {{ Form::password("password",  array('class' => 'form-control', "placeholder" => Lang::get('messages.LOGIN_PASSWORD'))) }}
     @if ($error = $errors->first("password"))
                <div class="error">
                    {{ $error }}
                </div>
            @endif
    {{ Form::submit("Connection",  array('class' => 'btn btn-lg btn-primary btn-block')) }}
    {{ Form::close() }}
    </div>
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop