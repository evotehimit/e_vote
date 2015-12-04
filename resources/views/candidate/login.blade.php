@extends('app')
@section('body')
	{!! Form::open(array('action' => 'LoginCandidateController@postlogin')) !!}
	 <div class="isi">
			<div class="col-md-6" style="text-align:center;">
				<img alt="E-Vote2015" class="img-responsive" width="420" height="420" src="images/Maskot3.png"/>
			</div>
			<div class="col-md-6" id="isi-kanan">
				<div class="login">
					<h2 style="text-align:center;">Login Candidate</h2><br>
					<div class="input-group">
				  		<span class="input-group-addon">@</span>
				  		<input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
					</div>
					<div class="input-group" style="padding-top:12px;">
				  		<span class="input-group-addon" id="basic-addon1">{ }</span>
				  		<input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
					</div><br>	
					<input class="btn btn-default" id="button" type="submit" value="Login">
					<input class="btn btn-default" id="button" type="reset" value="Reset">
				</div>
			</div>
	 </div>
	{!! Form::close() !!}

@endsection