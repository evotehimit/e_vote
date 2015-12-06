@extends('app')
@section('head')
<script type="text/javascript">
	function navigate_tabs(container, tab)
	{
		$(".data_diri").css('display' , 'none');
		$("#tab-data_diri").removeClass('buttonHover');
		$(".download").css('display' , 'none');
		$("#tab-download").removeClass('buttonHover');
		$(".upload").css('display' , 'none');
		$("#tab-upload").removeClass('buttonHover');

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
					<input class="btn btn-default" id="button" type="submit" value="Change">
			{!! Form::close() !!}
		</div>
	@elseif($cekcaka==0)
	<div class="first-login">Silakan Lengkapi Data dibawah ini !</div><br>
	<div class="form">
		<div><h3>Masukkan Data Diri :</h3></div><hr>
		{!! Form::open(array('id'=>'l-data', 'url'=>'dashboard/datapribadi', 'files'=>'true', 'method'=>'post')) !!}
		<div align="left">
			<div class="input-group"><label>NRP : </label><input name="nrp" type="number" required number class="form-control" placeholder="NRP" value="{{$data->nrp_caka}}" size="20" readonly="readonly"><span class="" id="warning"></span></div><br>
			<div class="input-group"><textarea  name="alamat" required  class="form-control" id="form-span" placeholder="Alamat" cols="50" rows="3"></textarea> <span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="telepon" required number minlength="11" type="number" class="form-control" id="form-span" placeholder="No. Telp" size="15"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="email" type="email" required email class="form-control" id="form-span" placeholder="E-mail : x.@gmail.com"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="tmp_lahir" required type="text" class="form-control" id="form-span" placeholder="Tempat Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="tgl_lahir" required date type="date" class="form-control" id="form-span" placeholder="Tanggal lahir"><span class="input-group-addon" id="warning">*</span></div><br>
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
			<div class="input-group"><input name="ip_1" required type="text" class="form-control" placeholder="Nilai IP Semester1"><span class="input-group-addon" id="warning">*</span></div><br>
			<div class="input-group"><input name="ip_2" required type="text" class="form-control" placeholder="Nilai IP Semester2"><span class="input-group-addon" id="warning">*</span></div>
			{!! Form::file('image') !!}
			<hr>
			<h5 style="color:red;">* Wajib Diisi!</h5>
			<div align="center"><input class="btn btn-default" id="button" type="submit" value="Simpan dan Lanjutkan"></div>
			{!! Form::close() !!}
		</div>
	</div>
	@elseif($cekcawaka==0)
	<div class="first-login">Silakan Lengkapi Data di bawah ini !</div><br>
		<div class="form" >
		<div><h3>Masukkan Data Diri Wakil Ketua :</h3></div><hr>
		{!! Form::open(array('url'=>'dashboard/datapribadi', 'files'=>'true', 'method'=>'post')) !!}
		<div align="left">
		<div class="input-group"><label>NRP : </label><input name="nrp" type="number" class="form-control" placeholder="NRP" size="20" value="{{$data->nrp_cawaka}}" readonly="readonly"><span class="" id="warning"></span></div><br>
		<div class="input-group"><textarea  name="alamat" required  class="form-control" id="form-span" placeholder="Alamat" cols="50" rows="3"></textarea><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="telepon" type="number" required number class="form-control" id="form-span" placeholder="No. Telp"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="email" type="email" required email class="form-control" id="form-span" placeholder="E-mail : x.@gmail.com"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="tmp_lahir" type="text" required class="form-control" id="form-span" placeholder="Tempat Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
		<div class="input-group"><input name="tgl_lahir" type="date" required date class="form-control" id="form-span" placeholder="Tanggal Lahir"><span class="input-group-addon" id="warning">*</span></div><br>
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
			{!! Form::file('image') !!}
		<hr>
			<h5 style="color:red;">* Wajib Diisi!</h5>
		</div>
		<div align="center"><input class="btn btn-default" id="button" type="submit" value="Simpan dan Lanjutkan"></div>
		{!! Form::close() !!}
	</div>
	@elseif($cekcaka>0 and $cekcawaka>0)
	<div id="tab" align="center">
	<a href="javascript:navigate_tabs('data_diri','tab-data_diri');"><div id="tabmenu">Data Diri</div></a>
	<a href="javascript:navigate_tabs('download','tab-download');"><div id="tabmenu">Download</div></a>
	<a href="javascript:navigate_tabs('upload','tab-upload');"><div id="tabmenu">Upload</div></a>
	</div>
	<div class="data_diri" align="left" style="padding:30px; min-height:500px">
		<div class="table" style="float:left; margin:5px; width:48%; min-height:370px">
						<div><h3>Ketua Kandidat :</h3></div><hr>
						<table class="table">
							<tr valign="center">
								<td align="center" width="50%" >
									<img src="foto_kandidat/{{$pribadika->foto}}" class="img-responsive" alt="Foto Ketua Kandidat">
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
											<td>@if($pribadika->sex==0)
													Laki-Laki
												@else
													Perempuan
												@endif
											</td>
										</tr>
										<tr>
											<td width="40%"><label>Agama</label></td>
											<td width="5%" align="left"> : </td>
											<td>@if($pribadika->agama==1)
													Islam
												@elseif($pribadika->agama==2)
													Kristen
												@elseif($pribadika->agama==3)
													Katolik
												@elseif($pribadika->agama==4)
													Hindu
												@else
													Kongucu
												@endif</td>
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
									<img src="foto_kandidat/{{$pribadiwaka->foto}}" class="img-responsive" alt="Foto Ketua Kandidat">
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
											<td>@if($pribadiwaka->sex==0)
													Laki-Laki
												@else
													Perempuan
												@endif
											</td>
										</tr>
										<tr>
											<td width="40%"><label>Agama</label></td>
											<td width="5%" align="left"> : </td>
											<td>@if($pribadiwaka->agama==1)
													Islam
												@elseif($pribadiwaka->agama==2)
													Kristen
												@elseif($pribadiwaka->agama==3)
													Katolik
												@elseif($pribadiwaka->agama==4)
													Hindu
												@else
													Kongucu
												@endif</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
		</div>
	</div>
	<div class="download" align="left" style="padding:30px; min-height:500px">
		<div class="table" style="float:left; margin:5px; width:48%; min-height:370px">
						<div><h3>Download File Disini :</h3></div><hr>
						<a href="lampiran/Daftar_TSK_Suksesi_2015.docx">Formulir Daftar TSC</a><br>
						<a href="lampiran/Formulir_Pendaftaran_Kandidat_2015.docx">Formulir Pendaftaran Kandidat</a><br>
						<a href="lampiran/Surat_Ijin_Peminjaman_Flooring_KPU.docx">Surat Ijin Peminjaman Flooring KPU</a><br>
						<a href="lampiran/Surat_Rekomendasi_Kandidat.docx">Surat Rekomendasi Kandidat</a><br>
		</div>
	</div>

	<div class="upload" align="left" style="padding:30px; min-height:500px">
	<div class="table" style="float:left; margin:5px; width:48%; min-height:370px">
		<div><h3>Document yang di Upload :</h3></div><hr>
		<ul type="cycle" align="left">
			<li>Deskripsi diri</li>
			<li>Visi dan Misi</li>
			<li>Program Kerja Unggulan</li>
			<li>Rencana Strategis</li>
			<li>Essai "Pentingnya Trias Politika di HIMIT"</li>
		</ul><br>

				<div align="left"><h4>Upload File Disini :</h4></div>
				{!! Form::open(array('id'=>'l-data', 'action'=>'CandidateController@upload', 'files'=>'true', 'method'=>'post')) !!}
				{!! Form::file('data') !!}<hr>
				{!! Form::submit('Sent') !!}
				{!! Form::close() !!}
		</div>
		
		<div class="table" style="float:left; margin:5px; width:48%; min-height:370px">
		<div><h3>Document yang dikumpulkan :</h3></div><hr>
		<ul type="cycle" align="left">
			<li>Formulir Pendaftaran</li>
			<li>Surat Izin Orang Tua/ Wali</li>
			<li>Surat Rekomendasi Kapodri</li>
			<li>Formulir Daftar TSC</li>
			<li>Surat Rekomendasi dari HIMIT</li>
			<li>Surat Keterangan Sehat</li>
			<li>Surat Keterangan Bebas Narkoba</li>
			<li>Deskripsi Diri</li>
			<li>Visi Misi</li>
			<li>Program Kerja Unggulan</li>
			<li>Rencana Strategis Kepengurusan HIMIT</li>
			<li>Lampiran Fotocopy KTP</li>
			<li>Lampiran Fotocopy smartcard/ KTM bagian depan</li>
			<li>Lampiran Foto Copy/ KTM Tim SUkses Calon(TSC)</li>
		</ul><br><hr>
		</div>
	</div>

	@endif
@endsection

