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
			<div class="input-group"><label>NRP : </label><input name="nrp" type="text" class="form-control" placeholder="NRP" value="{{$data->nrp_caka}}" size="20" readonly="readonly"><span class="" id="warning"></span></div><br>
			<div class="input-group"><input name="foto" type="text" class="form-control" id="form-span" placeholder="Foto"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><textarea  name="alamat"  class="form-control" id="form-span" placeholder="Alamat" cols="50" rows="3"></textarea> <span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="telepon" type="text" class="form-control" id="form-span" placeholder="No. Telp" size="15"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="email" type="text" class="form-control" id="form-span" placeholder="E-mail : x.@gmail.com"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="tmp_lahir" type="text" class="form-control" id="form-span" placeholder="Tempat Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="tgl_lahir" type="text" class="form-control" id="form-span" placeholder="Tanggal lahir"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group">
				<select name="sex" class="form-control" id="selected">
						<option value="">Pilih Jenis Kelamin</option>
				        <option value="L">Laki-laki</option>
				        <option value="P">Perempuan</option>
				      </select>
				 <span class="input-group-addon" id="warning">*</span>
			</div><br>
			<div class="input-group">
				<select name="agama" class="form-control">
						<option value="">Pilih Agama</option>
				        <option value="1">Islam</option>
				        <option value="2">Kristen</option>
				        <option value="3">Katolik</option>
				        <option value="4">Hindu</option>
				        <option value="5">Kongucu</option>
				      </select>
				 <span class="input-group-addon" id="warning">*</span>
			</div><br>
			<div class="input-group"><input name="ip_1" type="text" class="form-control" placeholder="Nilai IP Semester1"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="ip_2" type="text" class="form-control" placeholder="Nilai IP Semester2"><span class="input-group-addon" id="warning">*</span></div>
			<hr>
			<h5 style="color:red;">* Wajib Diisi!</h5>
			<div align="center"><input class="btn btn-default" id="button" type="submit" value="Simpan dan Lanjutkan"></div>
			{!! Form::close() !!}
		</div>
	</div>
	@elseif($data->nrp_cawaka == 0)
	<div class="first-login">Pendaftaran Wakil Ketua!</div><br>
	<div class="form">
		<div><h3>Masukkan data :</h3></div><hr>
		{!! Form::open(array('action'=>'CandidateController@daftarcawaka')) !!}
			<input type="text" name="nrp_cawaka" class="form-control" placeholder="NRP Wakil Ketua"><hr>
			<div align="center"><input class="btn btn-default" id="button" type="submit" value="Daftar dan Lanjutkan"></div>
		{!! Form::close() !!}
	</div>
	@elseif($cekcawaka==0)
	<div class="first-login">Silakan Lengkapi Data di bawah ini !</div><br>
		<div class="form" >
		<div><h3>Masukkan Data Diri Wakil Ketua :</h3></div><hr>
		{!! Form::open(array('action'=>'CandidateController@inputpribadi')) !!}
		<div align="left">
		<div class="input-group"><label>NRP : </label><input name="nrp" type="text" class="form-control" placeholder="NRP" size="20" value="{{$data->nrp_cawaka}}" readonly="readonly"><span class="" id="warning"></span></div><br>
		<div class="input-group"><input name="foto" type="text" class="form-control" id="form-span" placeholder="Foto"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="alamat" type="text" class="form-control" id="form-span" placeholder="Alamat"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="telepon" type="text" class="form-control" id="form-span" placeholder="No. Telp"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="email" type="text" class="form-control" id="form-span" placeholder="E-mail : x.@gmail.com"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="tmp_lahir" type="text" class="form-control" id="form-span" placeholder="Tempat Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="tgl_lahir" type="text" class="form-control" id="form-span" placeholder="Tanggal Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group">
				<select name="sex" class="form-control" id="selected">
						<option value="">Pilih Jenis Kelamin</option>
				        <option value="L">Laki-laki</option>
				        <option value="P">Perempuan</option>
				      </select>
				 <span class="input-group-addon" id="warning">*</span>
			</div><br>
			<div class="input-group">
				<select name="agama" class="form-control">
						<option value="">Pilih Agama</option>
				        <option value="1">Islam</option>
				        <option value="2">Kristen</option>
				        <option value="3">Katolik</option>
				        <option value="4">Hindu</option>
				        <option value="5">Kongucu</option>
				      </select>
				 <span class="input-group-addon" id="warning">*</span>
			</div><br>
		<hr>
			<h5 style="color:red;">* Wajib Diisi!</h5>
		</div>
		<div align="center"><input class="btn btn-default" id="button" type="submit" value="Simpan dan Lanjutkan"></div>
		{!! Form::close() !!}
	</div>
	@elseif($cekcaka>0 and $cekcawaka>0)
	<div id="tab" align="center">
	<a href="javascript:navigate_tabs('data_diri','tab-data_diri');"><div id="tabmenu">Data Diri</div></a>
	<a href="javascript:navigate_tabs('pendidikan','tab-pendidikan');" class="buttons"><div id="tabmenu">Riwayat Pendidikan</div></a>
	<a href="javascript:navigate_tabs('prestasi','tab-prestasi');" class="buttons" ><div id="tabmenu">Prestasi</div></a>
	<a href="javascript:navigate_tabs('organisasi','tab-organisasi');" class="buttons" ><div id="tabmenu">Organisasi</div></a>
	<a href="javascript:navigate_tabs('pelatihan','tab-pelatihan');" class="buttons"><div id="tabmenu">Pelatihan</div></a>
	</div>
	<div class="data_diri" align="left" style="padding:30px; min-height:500px">
		<div class="table" style="float:left; margin:5px; width:48%; min-height:370px">
						<div><h3>Ketua Kandidat :</h3></div><hr>
						<table class="table">
							<tr valign="center">
								<td align="center" width="50%" >
									<img src="images/{{$pribadika->foto}}" alt="Foto Ketua Kandidat">
								</td>
								<td align="left">
									<table>
										<tr>
											<td width="40%"><label>NRP</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->nrp}}</td>
										</tr>
										<tr>
											<td width="40%"><label>Alamat</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->alamat}}</td>
										</tr>
										<tr>
											<td width="40%"><label>HP</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->telepon}}</td>
										</tr>
										<tr>
											<td width="40%"><label>E-mail</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->email}}</td>
										</tr>
										<tr>
											<td width="40%"><label>TTL</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->tmp_lahir}}, {{$pribadika->tgl_lahir}}</td>
										</tr>
										<tr>
											<td width="40%"><label>Jenis Kelamin</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->sex}}</td>
										</tr>
										<tr>
											<td width="40%"><label>Agama</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->agama}}</td>
										</tr>
										<tr>
											<td width="40%"><label>IP Semester 1</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->ip_1}}</td>
										</tr>
										<tr>
											<td width="40%"><label>IP Semester 2</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadika->ip_2}}</td>
										</tr>

									</table>
								</td>
							</tr>
						</table>
						
		</div>
		<div class="table" style="float:left; margin:5px; width:48%; min-height:370px">
			<div><h3>Wakil Ketua Kandidat :</h3></div><hr>
						<table class="table">
							<tr>
								<td align="center" width="50%">
									<img src="images/{{$pribadiwaka->foto}}" alt="Foto Ketua Kandidat">
								</td>
								<td align="left">
									<table>
										<tr>
											<td width="40%"><label>NRP</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadiwaka->nrp}}</td>
										</tr>
										<tr>
											<td width="40%"><label>Alamat</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadiwaka->alamat}}</td>
										</tr>
										<tr>
											<td width="40%"><label>HP</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadiwaka->telepon}}</td>
										</tr>
										<tr>
											<td width="40%"><label>E-mail</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadiwaka->email}}</td>
										</tr>
										<tr>
											<td width="40%"><label>TTL</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadiwaka->tmp_lahir}}, {{$pribadiwaka->tgl_lahir}}</td>
										</tr>
										<tr>
											<td width="40%"><label>Jenis Kelamin</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadiwaka->sex}}</td>
										</tr>
										<tr>
											<td width="40%"><label>Agama</label></td>
											<td width="5%" align="left"> : </td>
											<td>{{$pribadiwaka->agama}}</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
									
				
		</div>
	</div>

	<div class="pendidikan" style="display:none;">
	<div class="table" align="left" style="margin:30px;">
						<button type="button" class="btn btn-default" id="button"data-toggle="modal" data-target="#myPendidikan">Tambah Data</button>
						<div id="myPendidikan" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Data Riwayat Pendidikan</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@pendidikan')) !!}
											<div class="input-group"><input type="text" name="nrp" class="form-control" placeholder="NRP"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group">
												<select name="jenjang_pendidikan" class="form-control" id="selected">
														<option value="">Pilih Jejang Pendidikan</option>
												        <option value="SD/Mts">SMP/MTs</option>
												        <option value="SD/MI">SD/MI</option>
												      </select>
												 <span class="input-group-addon" id="warning">*</span>
											</div><br>
											<div class="input-group"><input type="text" name="nama_pendidikan" class="form-control" placeholder="Nama Instansi Pendidikan"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="masuk_pendidikan" class="form-control" placeholder="Tahun Masuk"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="keluar_pendidikan" class="form-control" placeholder="Tahun Keluar"><span class="input-group-addon" id="warning"> *</span></div><br>
											<hr>
											<h5 style="color:red;">* Wajib Diisi!</h5>
											<div align="center"><input class="btn btn-default" id="button" type="submit" value="Tambah"></div>
										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
				
					<div><h3>Pendidikan Ketua Kandidat :</h3></div>
					<hr>
					<table class="table table-hover table-striped tabel-bordered">
						<tr style="background-color:##35b0f4;">
							<th>Jenjang</th>
							<th>Nama Institusi</th>
							<th>Tahun Masuk</th>
							<th>Tahun Keluar</th>
						</tr>
					@foreach($pendidikan->where('nrp',$data->nrp_caka) as $caka)
					<tr>
							<td>{{ $caka->jenjang_pendidikan }}</td>
							<td>{{ $caka->nama_pendidikan }}</td>
							<td>{{ $caka->masuk_pendidikan }}</td>
							<td>{{ $caka->keluar_pendidikan }}</td>
						</tr>
						@endforeach
					</table>
					
					<br>
					<div><h3>Pendidikan Wakil Ketua Kandidat :</h3></div>
					<hr>
					<table class="table table-hover table-striped tabel-bordered">
						<tr style="background-color:##35b0f4;">
							<th>Jenjang</th>
							<th>Nama Institusi</th>
							<th>Tahun Masuk</th>
							<th>Tahun Keluar</th>
						</tr>
					@foreach($pendidikan->where('nrp',$data->nrp_cawaka) as $cawaka)
					<tr>
							<td>{{ $cawaka->jenjang_pendidikan }}</td>
							<td>{{ $cawaka->nama_pendidikan }}</td>
							<td>{{ $cawaka->masuk_pendidikan }}</td>
							<td>{{ $cawaka->keluar_pendidikan }}</td>
						</tr>
						@endforeach
					</table>
	</div>
	</div>				
	<div class="prestasi" style="display:none;">
	<div class="table" align="left" style="margin:30px;">
		<button type="button" class="btn btn-default" id="button" data-toggle="modal" data-target="#myPrestasi">Tambah Data</button>
						<div id="myPrestasi" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Prestasi</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@prestasi')) !!}
											<div class="input-group"><input type="text" name="nrp" class="form-control" placeholder="NRP"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="nama_prestasi" class="form-control" placeholder="Nama Prestasi"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group">
												<select name="peringkat_prestasi" class="form-control" id="selected">
														<option value="">Pilih Peringkat Prestasi</option>
												        <option value="1">Juara 1</option>
												        <option value="2">Juara 2</option>
												        <option value="3">Juara 3</option>
												        <option value="4">Harapan 1</option>
												        <option value="5">Harapan 2</option>
												        <option value="6">Harapan 3</option>
												      </select>
												 <span class="input-group-addon" id="warning">*</span>
											</div><br>
												<div class="input-group">
												<select name="tingkat_prestasi" class="form-control" id="selected">
														<option value="">Pilih Tingkat Prestasi</option>
														<option value="1">Internasional</option>
												        <option value="2">Nasional</option>
												        <option value="3">Propoinsi</option>
												        <option value="4">Kabupaten/Kota</option>
												      </select>
												 <span class="input-group-addon" id="warning">*</span>
											</div><br>
											<div class="input-group"><input type="text" name="tahun_prestasi" class="form-control" placeholder="Tahun"><span class="input-group-addon" id="warning"> *</span></div><br>
											<hr>
											<h5 style="color:red;">* Wajib Diisi!</h5>
											<div align="center"><input class="btn btn-default" id="button" type="submit" value="Tambah"></div>

										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
						<br>
						<div><h3>Prestasi Ketua Kandidat :</h3></div>
						<hr>
						<table class="table table-hover table-striped tabel-bordered">
							<tr style="background-color:##35b0f4;">
								<th>Nama Prestasi</th>
								<th>Peringkat</th>
								<th>Tingkat</th>
								<th>Tahun</th>
							</tr>
						@foreach($prestasi->where('nrp', $data->nrp_caka) as $pres)
						<tr>
								<td>{{$pres->nama_prestasi}}</td>
								<td>{{$pres->peringkat_prestasi}}</td>
								<td>{{$pres->tingkat_prestasi}}</td>
								<td>{{$pres->tahun_prestasi}}</td>
							</tr>
							@endforeach
						</table><br>
						<div><h3>Prestasi Wakil Ketua Kandidat :</h3></div>
						<hr>
						<table class="table table-hover table-striped tabel-bordered">
							<tr style="background-color:##35b0f4;">
								<th>Nama Prestasi</th>
								<th>Peringkat</th>
								<th>Tingkat</th>
								<th>Tahun</th>
							</tr>
						@foreach($prestasi->where('nrp', $data->nrp_cawaka) as $preswa)
						<tr>
								<td>{{$preswa->nama_prestasi}}</td>
								<td>{{$preswa->peringkat_prestasi}}</td>
								<td>{{$preswa->tingkat_prestasi}}</td>
								<td>{{$preswa->tahun_prestasi}}</td>
							</tr>
							@endforeach
						</table>
	</div>
	</div>
	<div class="organisasi" style="display:none;">
	<div class="table" align="left" style="margin:30px;">
		<button type="button" class="btn btn-default" id="button" data-toggle="modal" data-target="#myOrganisasi">Tambah Data</button>
						<div id="myOrganisasi" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Organisasi</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@organisasi')) !!}
											<div class="input-group"><input type="text" name="nrp" class="form-control" placeholder="NRP"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="nama_organisasi" class="form-control" placeholder="Nama Organisasi"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="jabatan_organisasi" class="form-control" placeholder="Jabatan"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="awal_organisasi" class="form-control" placeholder="Tahun jabatan"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="akhir_organisasi" class="form-control" placeholder="AKhir Jabatan"><span class="input-group-addon" id="warning"> *</span></div><br>
											<hr>
											<h5 style="color:red;">* Wajib Diisi!</h5>
											<div align="center"><input class="btn btn-default" id="button" type="submit" value="Tambah"></div>

										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
						<br><br>
				<div><h3>Pengalaman Organisasi Ketua Kandidat :</h3></div>
						<hr>
						<table class="table table-hover table-striped tabel-bordered">
							<tr style="background-color:##35b0f4;">
								<th>Nama Organisasi</th>
								<th>Jabatan</th>
								<th>Awal Menjabat</th>
								<th>Akhir Jabatan</th>
							</tr>
						@foreach($organisasi->where('nrp', $data->nrp_caka) as $orgake)
						<tr>
								<td>{{$orgake->nama_organisasi}}</td>
								<td>{{$orgake->jabatan_organisasi}}</td>
								<td>{{$orgake->awal_organisasi}}</td>
								<td>{{$orgake->akhir_organisasi}}</td>
							</tr>
							@endforeach
						</table>
						<br>
				<div><h3>Pengalaman Organisasi Wakil Ketua Kandidat :</h3></div>
						<hr>
						<table class="table table-hover table-striped tabel-bordered">
							<tr style="background-color:##35b0f4;">
								<th>Nama Organisasi</th>
								<th>Jabatan</th>
								<th>Awal Menjabat</th>
								<th>Akhir Jabatan</th>
							</tr>
						@foreach($organisasi->where('nrp', $data->nrp_cawaka) as $orgawa)
						<tr>
								<td>{{$orgawa->nama_organisasi}}</td>
								<td>{{$orgawa->jabatan_organisasi}}</td>
								<td>{{$orgawa->awal_organisasi}}</td>
								<td>{{$orgawa->akhir_organisasi}}</td>
							</tr>
							@endforeach
						</table>
	</div>
	</div>
	<div class="pelatihan" style="display:none;">
	<div class="table" align="left" style="margin:30px;">
		<button type="button" class="btn btn-default" id="button" data-toggle="modal" data-target="#myPelatihan">Tambah Data</button>
						<div id="myPelatihan" class="modal fade" role="dialog">
			  				<div class="modal-dialog">
			    				<div class="modal-content">
			      					<div class="modal-header">
			        					<button type="button" class="close" data-dismiss="modal">&times;</button>
			        					<h4 class="modal-title">Pelatihan</h4>
			      					</div>
			      					<div class="modal-body">
								        {!! Form::open(array('action'=>'CandidateController@pelatihan')) !!}
											<div class="input-group"><input type="text" name="nrp" class="form-control" placeholder="NRP"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group"><input type="text" name="nama_pelatihan" class="form-control" placeholder="Nama Pelatihan"><span class="input-group-addon" id="warning"> *</span></div><br>
											<div class="input-group">
												<select name="cangkupan_pelatihan" class="form-control" id="selected">
														<option value="">Pilih Cangkupan Pelatihan</option>
												        <option value="1">Kampus/Sekolah</option>
												        <option value="2">Kab/Kota</option>
												        <option value="3">Propinsi</option>
												        <option value="3">Nasional</option>
												      </select>
												 <span class="input-group-addon" id="warning">*</span>
											</div><br>
											<div class="input-group"><input type="text" name="tahun_pelatihan" class="form-control" placeholder="Tahun"><span class="input-group-addon" id="warning"> *</span></div><br>
											<hr>
											<h5 style="color:red;">* Wajib Diisi!</h5>
											<div align="center"><input class="btn btn-default" id="button" type="submit" value="Tambah"></div>
										{!! Form::close() !!}
			      					</div>
			      					<div class="modal-footer">
			        					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      					</div>
			    				</div>
			  				</div>
						</div>
						<br><br>
				<div><h3>Pengalaman Pelatihan Ketua Kandidat :</h3></div>
						<hr>
						<table class="table table-hover table-striped tabel-bordered">
							<tr style="background-color:##35b0f4;">
								<th>Nama Pelatihan</th>
								<th>Cangkupan</th>
								<th>Tahun</th>
							</tr>
						@foreach($pelatihan->where('nrp', $data->nrp_caka) as $pelke)
						<tr>
								<td>{{$pelke->nama_pelatihan}}</td>
								<td>{{$pelke->cakupan_pelatihan}}</td>
								<td>{{$pelke->tahun_pelatihan}}</td>
							</tr>
							@endforeach
						</table>
				<br>
				<div><h3>Pengalaman Pelatihan Wakil Ketua Kandidat :</h3></div>
					<hr>
					<table class="table table-hover table-striped tabel-bordered">
						<tr style="background-color:##35b0f4;">
							<th>Nama Pelatihan</th>
							<th>Cangkupan</th>
							<th>Tahun</th>
						</tr>
					@foreach($pelatihan->where('nrp', $data->nrp_cawaka) as $pelwa)
					<tr>
							<td>{{$pelwa->nama_pelatihan}}</td>
							<td>{{$pelwa->cakupan_pelatihan}}</td>
							<td>{{$pelwa->tahun_pelatihan}}</td>
						</tr>
						@endforeach
					</table>
	</div>
	</div>
	@endif
@endsection