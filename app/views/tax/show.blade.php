@extends("layout")
@section("content")

	<div class="row">
			<div class="col-md-4"><img src="{{asset('assets/images/CiternesExpert.png')}}" style="width:100%;"></div>
			<div class="col-md-4 col-md-offset-4"><a class="btn btn-lg btn-primary btn-block btn-flat" type="submit">Logout</button></a>
		</div>
		<div class="row mainContent">
			<div class="col-md-4" style="height:300px;padding:10px;">
				<div class="centeredInput">
					<h2>Province</h2>
					<select id="province-select" multiple class="form-control multiple" style="font-size:3em;">
						<option selected="selected">Quebec</option>
						<option>Ontario</option>
						<option>Alberta</option>
						<option>Saskatchewan</option>
						<option>BC</option>
						<option>IPE</option>
						<option>NFL</option>
						<option>Manitoba</option>
					</select>
				</div>
			</div>
			<div class="col-md-4" style="height:300px;padding:10px;">
				<div class="centeredInput">
					<h2>Category</h2>
					<select id="category-select" multiple class="form-control multiple" style="font-size:3em;">
						<option selected="selected">Mileage</option>
						<option>Food</option>
						<option>Travel</option>
						<option>Rental</option>
						<option>Other</option>
					</select>
				</div>
			</div>
			<div class="col-md-4 rotate" style="background:#2ecc71;height:300px;padding:10px;"><a href=""><img src="{{asset('assets/images/done.png')}}" style="width:100%"></a></div>
		</div>
		<div class="row">
			<div class="col-md-4" style="height:300px;padding:10px;text-align: center;">
				<div class="centeredInput">
					<h2>Type</h2>
					<select multiple class="form-control multiple" style="font-size:3em;">
						<option>TPS</option>
						<option>TVQ</option>
						<option>CTI</option>
						<option>Other</option>
					</select>
				</div>
			</div>
			<div class="col-md-4" style="height:300px;padding:10px;text-align: center;">
				<div><h2>New Rate</h2></div>
				<div class="bigText"><input type="text" placeholder="18 %" class="taxInput" style="width: 60%;"></div>
			</div>
			<div class="col-md-4 rotate" style="background:#e67e22;height:300px;padding:10px;"><a href="admin.html"><img src="{{asset('assets/images/back.png')}}" style="width:100%"></a></div>

		</div>



@stop
@section("script")
    @parent
    {{HTML::script('js/tax.js')}}
@stop
