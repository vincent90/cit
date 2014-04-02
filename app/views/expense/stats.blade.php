@extends("layout")
@section("content")

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

    <div class="col-md-8 skill-list" style="height:500px;padding:10px;border-left:5px solid green; border-bottom:5px solid green">
        <h1>Global Statistics</h1>
            <ul class="skill-list">
              <li class="skill">
                <h3>Alexandre Vanier: 2 000$</h3>
                <progress class="skill-1" max="100" value="50">
                  <strong>Skill Level: 50%</strong>
                </progress>
              </li>
              <li class="skill">
                <h3>Vincent Matte: 3 520$</h3>
                <progress class="skill-2" max="100" value="75">
                  <strong>Skill Level: 75%</strong>
                </progress>
              </li>
              <li class="skill">
                <h3>Laura Nguyen: 1 300$</h3>
                <progress class="skill-3" max="100" value="25">
                  <strong>Skill Level: 25%</strong>
                </progress>
              </li>
              <li class="skill">
                <h3>Pierre Dubois: 500$</h3>
                <progress class="skill-4" max="100" value="10">
                  <strong>Skill Level: 10%</strong>
                </progress>
              </li>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 rotate" style="background:#e67e22;height:300px;padding:10px;">
                    <a href="{{ URL::route("user/profile") }}">
                        <img src="{{asset('assets/images/back.png')}}" style="width:100%">
                    </a>
                </div>
            </div>
        </div>
@stop
