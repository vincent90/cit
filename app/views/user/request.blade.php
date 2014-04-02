@extends("layout")
@section("content")
<div class="container">
    {{ Form::open([
        "route"        => "user/request",
        "autocomplete" => "off"
    ]) }}
        {{ Form::label("email", "Email") }}
        {{ Form::text("email", Input::get("email"), [
            "placeholder" => "john@example.com"
        ]) }}
        {{ Form::submit("reset") }}
    {{ Form::close() }}
    </div>
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop