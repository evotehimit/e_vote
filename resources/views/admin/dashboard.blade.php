@extends('app')
@section('body')
	<br>
	<button type="button" class="btn btn-default" id="button"data-toggle="modal" data-target="#myCandidate">Tambah Data</button>
						<div id="myCandidate" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Tambah Kandidat</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'AdminController@tambahkandidat')) !!}
								        	<div class="input-group"><input type="text" name="username" class="form-control" placeholder="Username"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="nrp_caka" class="form-control" placeholder="NRP Ketua"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="nrp_cawaka" class="form-control" placeholder="NRP Wakil Ketua"><span class="input-group-addon" id="warning"> *</span></div><br>
											<hr>
											<h5 style="color:red;">Password default = himitjaya</h5>
											<div align="center"><input class="btn btn-default" id="button" type="submit" value="Tambah Kandidat"></div>
										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
						<br><br>
		<table class="table table-hover table-striped tabel-bordered">
			<tr style="background-color:##35b0f4;">
				<th>Username</th>
				<th>NRP Calon Ketua</th>
				<th>NRP Calon Wakil Ketua</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach($data as $user)
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ $user->nrp_caka }}</td>
				<td>{{ $user->nrp_cawaka }}</td>
			</tr>
			@endforeach
		</table>
@endsection