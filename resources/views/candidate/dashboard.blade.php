@extends('app')
@section('head')
<script type="text/javascript">
	function navigate_tabs(container, tab)
	{
		$(".data_diri").css('display' , 'none');
		$(".pendidikan").css('display' , 'none');
		$(".prestasi").css('display' , 'none');
		$(".organisasi").css('display' , 'none');
		$(".pelatihan").css('display' , 'none');

		$("#tab-data_diri").removeClass('buttonHover');
		$("#tab-pendidikan").removeClass('buttonHover');
		$("#tab-prestasi").removeClass('buttonHover');
		$("#tab-organisasi").removeClass('buttonHover');
		$("#tab-pelatihan").removeClass('buttonHover');

		$("#"+tab).addClass('buttonHover');
		$("."+container).show('fast');
	}
</script>
@endsection

@section('body')
	@if(Hash::check('himitjaya',$data->password))
		<div class="first-login" style="text-align:left;padding-left:30px;">Welcome {{ $data->username }} !</div>
			{!! Form::open(array('action'=>'CandidateController@changepassword')) !!}
			<div class="change-password">
				<quote><h3>This is the First time login, please change your default password.</h3></quote><br>
					<div class="input-group input-group">
  						<span class="input-group-addon" id="sizing-addon1">#</span>
  						<input type="password" class="form-control" name="pass" placeholder="New Password" aria-describedby="sizing-addon1">
					</div><br>
					<div class="input-group input-group">
  						<span class="input-group-addon" id="sizing-addon1">#</span>
  						<input type="password" class="form-control" name="confirmpass" placeholder="New Password Confirmation" aria-describedby="sizing-addon1">
					</div>
					<br>
					<input class="btn btn-default" id="button" type="submit" value="Change">
			{!! Form::close() !!}
		</div>
	@elseif($cekcaka==0)
	<div class="first-login">Silakan Lengkapi Data dibawah ini !</div><br>
	<div class="form">
		<div><h3>Masukkan Data Diri :</h3></div><hr>
		{!! Form::open(array('action'=>'CandidateController@inputpribadi')) !!}
		<div align="left">
			<div class="input-group"><input name="nrp" type="text" class="form-control" placeholder="NRP" value="{{$data->nrp_caka}}" readonly="readonly"><span class="input-group-addon" id="warning"> *</span></div><br>
			<div class="input-group"><input name="foto" type="text" class="form-control" placeholder="Foto"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="alamat" type="textarea" class="form-control" placeholder="Alamat"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="telepon" type="text" class="form-control" placeholder="Telp." ><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="email" type="text" class="form-control" placeholder="E-mail : @"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="tmp_lahir" type="text" class="form-control" placeholder="Tempat Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="tgl_lahir" type="text" class="form-control" placeholder="Tanggal lahir"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="sex" type="text" class="form-control" placeholder="Jenis Kelamin" ><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="agama" type="text" class="form-control" placeholder="Agama"><span class="input-group-addon" id="warning">*</span></div><br>
			<input name="ip_1" type="text" class="form-control" placeholder="IPK Semester1"><br>
			<input name="ip_2" type="text" class="form-control" placeholder="IPK Semester2">
			<hr>
			<h5 style="color:red;">* Wajib Diisi!</h5>
			{!! Form::submit('Simpan dan Lanjutkan') !!}
			{!! Form::close() !!}
		</div>
	</div>
	@elseif($data->nrp_cawaka == 0)
	<div class="first-login">Pendaftaran Wakil Ketua!</div><br>
	<div class="form">
		<div><h3>Masukkan data :</h3></div><hr>
		{!! Form::open(array('action'=>'CandidateController@daftarcawaka')) !!}
			<input type="text" name="nrp_cawaka" class="form-control" placeholder="NRP Wakil Ketua"><hr>
			{!! Form::submit('Daftar dan Lanjutkan') !!}
		{!! Form::close() !!}
	</div>
	@elseif($cekcawaka==0)
	<div class="first-login">Silakan Lengkapi Data di bawah ini !</div><br>
		<div class="form" >
		<div><h3>Masukkan Data Diri Wakil Ketua :</h3></div><hr>
		{!! Form::open(array('action'=>'CandidateController@inputpribadi')) !!}
		<div align="left">
		<div class="input-group"><input name="nrp" type="text" class="form-control" placeholder="NRP" value="{{$data->nrp_cawaka}}" readonly="readonly"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="foto" type="text" class="form-control" placeholder="Foto"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="alamat" type="text" class="form-control" placeholder="Alamat"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="telepon" type="text" class="form-control" placeholder="TELP."><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="email" type="text" class="form-control" placeholder="E-Mail : @"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="tmp_lahir" type="text" class="form-control" placeholder="Tempat Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="tgl_lahir" type="text" class="form-control" placeholder="Tanggal Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="sex" type="text" class="form-control" placeholder="Jenis Kelamin"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="agama" type="text" class="form-control" placeholder="Agama"><span class="input-group-addon" id="warning">*</span></div>
		<hr>
			<h5 style="color:red;">* Wajib Diisi!</h5>
		</div>
		{!! Form::submit('Simpan dan Lanjutkan') !!}
		{!! Form::close() !!}
	</div>
	@elseif($cekcaka>0 and $cekcawaka>0)
	|<a href="javascript:navigate_tabs('data_diri','tab-data_diri');" class="buttons">Data Diri</a>|
	<a href="javascript:navigate_tabs('pendidikan','tab-pendidikan');" class="buttons">Riwayat Pendidikan</a>|
	<a href="javascript:navigate_tabs('prestasi','tab-prestasi');" class="buttons">Prestasi</a>|
	<a href="javascript:navigate_tabs('organisasi','tab-organisasi');" class="buttons">Organisasi</a>|
	<a href="javascript:navigate_tabs('pelatihan','tab-pelatihan');" class="buttons">Pelatihan</a>|

	<div id="isi" class="data_diri">
						<div>Data Pribadi Ketua Kandidat</div>
						<label>NRP :</label>{{$pribadika->nrp}}<br>
						<label>Foto :</label>{{$pribadika->foto}}<br>
						<label>Alamat :</label>{{$pribadika->alamat}}<br>
						<label>HP :</label>{{$pribadika->telepon}}<br>
						<label>Email :</label>{{$pribadika->email}}<br>
						<label>TTL :</label>{{$pribadika->tmp_lahir}}, {{$pribadika->tgl_lahir}}<br>
						<label>Jenis Kelamin :</label>{{$pribadika->sex}}<br>
						<label>Agama :</label>{{$pribadika->agama}}<br>
						<label>IP Semester 1 :</label>{{$pribadika->ip_1}}<br>
						<label>IP Semester 2 :</label>{{$pribadika->ip_2}}<br>
						<br>
						<div>Data Pribadi Wakil Kandidat</div>
						<label>NRP :</label>{{$pribadiwaka->nrp}}<br>
						<label>Foto :</label>{{$pribadiwaka->foto}}<br>
						<label>Alamat :</label>{{$pribadiwaka->alamat}}<br>
						<label>HP :</label>{{$pribadiwaka->telepon}}<br>
						<label>Email :</label>{{$pribadiwaka->email}}<br>
						<label>TTL :</label>{{$pribadiwaka->tmp_lahir}}, {{$pribadiwaka->tgl_lahir}}<br>
						<label>Jenis Kelamin :</label>{{$pribadiwaka->sex}}<br>
						<label>Agama :</label>{{$pribadiwaka->agama}}<br>
	</div>

	<div class="pendidikan" style="display:none;">
						<button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#myPendidikan">Tambah Data</button>
						<div id="myPendidikan" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Data User</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@pendidikan')) !!}
											Nrp :<input type="text" name="nrp"><br>
											Jenjang :<input type="text" name="jenjang_pendidikan"><br>
											Nama Institusi :<input type="text" name="nama_pendidikan"><br>
											Tahun Masuk :<input type="text" name="masuk_pendidikan"><br>
											Tahun Keluar :<input type="text" name="keluar_pendidikan"><br>
											{!! Form::submit('Tambah') !!}
										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
				
					<div>Pendidikan Ketua</div>
					@foreach($pendidikan->where('nrp',$data->nrp_caka) as $caka)
						Jenjang : {{ $caka->jenjang_pendidikan }} <br>
						Nama Institusi :{{ $caka->nama_pendidikan }} <br>
						Tahun Masuk :{{ $caka->masuk_pendidikan }} <br>
						Tahun Keluar :{{ $caka->keluar_pendidikan }} <br><br>
					@endforeach
					<br><br>
					<div>Pendidikan Wakil Ketua</div>
					@foreach($pendidikan->where('nrp',$data->nrp_cawaka) as $cawaka)
						Jenjang : {{ $cawaka->jenjang_pendidikan }} <br>
						Nama Institusi :{{ $cawaka->nama_pendidikan }} <br>
						Tahun Masuk :{{ $cawaka->masuk_pendidikan }} <br>
						Tahun Keluar :{{ $cawaka->keluar_pendidikan }} <br>
					@endforeach

			
	</div>
						
	<div class="prestasi" style="display:none;">
		<button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#myPrestasi">Tambah Data</button>
						<div id="myPrestasi" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Prestasi</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@prestasi')) !!}
											Nrp :<input type="text" name="nrp"><br>
											Nama Prestasi :<input type="text" name="nama_prestasi"><br>
											Peringkat :<input type="text" name="peringkat_prestasi"><br>
											Tingkat :<input type="text" name="tingkat_prestasi"><br>
											Tahun Prestasi :<input type="text" name="tahun_prestasi"><br>
											{!! Form::submit('Tambah') !!}
										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
						<br>
						<div>Prestasi Ketua</div>
					@foreach($prestasi->where('nrp', $data->nrp_caka) as $pres)
						Nama Prestasi :{{$pres->nama_prestasi}}<br>
						Peringkat :{{$pres->peringkat_prestasi}}<br>
						Tingkat :{{$pres->tingkat_prestasi}}<br>
						Tahun Prestasi :{{$pres->tahun_prestasi}}<br><br>
					@endforeach
					<div>Prestasi Wakil</div>
					@foreach($prestasi->where('nrp', $data->nrp_cawaka) as $preswa)
						Nama Prestasi :{{$preswa->nama_prestasi}}<br>
						Peringkat :{{$preswa->peringkat_prestasi}}<br>
						Tingkat :{{$preswa->tingkat_prestasi}}<br>
						Tahun Prestasi :{{$preswa->tahun_prestasi}}<br><br>
					@endforeach
	</div>
	<div class="organisasi" style="display:none;">
		<button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#myOrganisasi">Tambah Data</button>
						<div id="myOrganisasi" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Organisasi</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@organisasi')) !!}
											Nrp :<input type="text" name="nrp"><br>
											Nama Organisasi :<input type="text" name="nama_organisasi"><br>
											Jabatan :<input type="text" name="jabatan_organisasi"><br>
											Awal Jabatan :<input type="text" name="awal_organisasi"><br>
											Akhir Jabatan :<input type="text" name="akhir_organisasi"><br>
											{!! Form::submit('Tambah') !!}
										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
						<br><br>
			<div>Ketua</div>
			@foreach($organisasi->where('nrp', $data->nrp_caka) as $orgake)
			Nama Organisasi :{{$orgake->nama_organisasi}}<br>
			Jabatan :{{$orgake->jabatan_organisasi}}<br>
			Awal Menjabat : {{$orgake->awal_organisasi}}<br>
			Akhir Jabatan : {{$orgake->akhir_organisasi}}<br><br>
			@endforeach
			<div>Wakil</div>
			@foreach($organisasi->where('nrp', $data->nrp_cawaka) as $orgawa)
			Nama Organisasi :{{$orgawa->nama_organisasi}}<br>
			Jabatan :{{$orgawa->jabatan_organisasi}}<br>
			Awal Menjabat : {{$orgawa->awal_organisasi}}<br>
			Akhir Jabatan : {{$orgawa->akhir_organisasi}}<br><br>
			@endforeach
	</div>
	<div class="pelatihan" style="display:none;">
		<button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#myPelatihan">Tambah Data</button>
						<div id="myPelatihan" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Pelatihan</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@pelatihan')) !!}
											Nrp :<input type="text" name="nrp"><br>
											Nama Pelatihan :<input type="text" name="nama_pelatihan"><br>
											Cakupan :<input type="text" name="cakupan_pelatihan"><br>
											Tahun Mengikuti :<input type="text" name="tahun_pelatihan"><br>
											{!! Form::submit('Tambah') !!}
										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
						<br><br>
			<div>Ketua</div>
			@foreach($pelatihan->where('nrp', $data->nrp_caka) as $pelke)
			Nama Pelatihan :{{$pelke->nama_pelatihan}}<br>
			Cakupan :{{$pelke->cakupan_pelatihan}}<br>
			Tahun :{{$pelke->tahun_pelatihan}}<br><br>
			@endforeach
			<br>
			<div>Wakil</div>
			@foreach($pelatihan->where('nrp', $data->nrp_cawaka) as $pelwa)
			Nama Pelatihan :{{$pelwa->nama_pelatihan}}<br>
			Cakupan :{{$pelwa->cakupan_pelatihan}}<br>
			Tahun :{{$pelwa->tahun_pelatihan}}<br><br>
			@endforeach
	</div>
	@endif
@endsection