@extends("layout")
@section("content")
<div class="container">
<div id="dialog-succes" title="Basic dialog">
    <p>{{ Session::get('message') }}</p>
</div>
	<div class="row">
			<div class="col-md-4"><img src="{{asset('assets/images/CiternesExpert.png')}}" style="width:100%;"></div>
			<div class="col-md-4 col-md-offset-4"><a href = "{{ URL::route("user/logout") }}"class="btn btn-lg btn-primary btn-block btn-flat" type="submit">Logout</button></a>
		</div>
		<div class="row mainContent">
			<div class="col-md-4" style="height:300px;padding:10px;">
				<div class="centeredInput">
					<h2>Province</h2>
					<select id="province-select" multiple class="form-control multiple" style="font-size:3em;">
					@foreach($provinces as $key => $value)
						<option value="{{ $value->ProvinceId }}">{{ $value->Name }}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4" style="height:300px;padding:10px;">
				<div class="centeredInput">
					<h2>Category</h2>
					<select id="category-select" multiple class="form-control multiple" style="font-size:3em;">
                    @foreach($category as $key => $value)
                        <option value="{{ $value->CategoryId }}">{{ $value->FrenchName }}</option>
                    @endforeach
					</select>
				</div>
			</div>
			<div id="updateRate" class="col-md-4 rotate" style="background:#2ecc71;height:300px;padding:10px;"><img src="{{asset('assets/images/done.png')}}" style="width:100%"></div>
		</div>
		<div class="row">
			<div class="col-md-4" style="height:300px;padding:10px;text-align: center;">
				<div class="centeredInput">
					<h2>Type</h2>
					<select id="type-select" multiple class="form-control multiple" style="font-size:3em;">
                       @foreach($taxType as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->FrenchName }}</option>
                       @endforeach

					</select>
				</div>
			</div>
			<div class="col-md-4" style="height:300px;padding:10px;text-align: center;">
				<div><h2>New Rate</h2></div>
				<div class="bigText"><input type="text" id="taxInput" placeholder="18 %" class="taxInput" style="width: 60%;"></div>
			</div>
			<div class="col-md-4 rotate" style="background:#e67e22;height:300px;padding:10px;"><a href="{{ URL::route("user/profile") }}"><img src="{{asset('assets/images/back.png')}}" style="width:100%"></a></div>

		</div>

</div>

@stop
@section("script")
    @parent
    {{HTML::script('js/tax.js')}}
@stop
