<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Pribadi;
use App\Pendidikan;
use App\Prestasi;
use App\Pelatihan;
use App\Organisasi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class CandidateController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('kandidat')){
            return redirect()->action('CandidateController@dashboard');
        }
        else{
            return redirect()->action('LoginCandidateController@getlogin');
        }
    }
    public function dashboard(Request $request){
        if($request->session()->has('kandidat')){
            $id = $request->session()->get('kandidat');
            $data = Candidate::where('id', $id)->first();
            $hak_akses = $data->hak_akses;
            $pribadika = Pribadi::where('nrp', $data->nrp_caka)->first();
            $pribadiwaka = Pribadi::where('nrp', $data->nrp_cawaka)->first();
            $cekcaka = Pribadi::where('nrp', $data->nrp_caka)->count();
            $cekcawaka = Pribadi::where('nrp', $data->nrp_cawaka)->count();
            $pendidikan = Pendidikan::all();
            $prestasi = Prestasi::all();
            $pelatihan = Pelatihan::all();
            $organisasi = Organisasi::all();
            return view('candidate.dashboard', compact(
                'data',
                'hak_akses',
                'pribadika',
                'pribadiwaka',
                'cekcaka',
                'cekcawaka',
                'pendidikan',
                'prestasi',
                'pelatihan',
                'organisasi'
                ));
        }
        else{
            return redirect()->action('LoginCandidateController@getlogin');
        }
    }
    public function changepassword(Request $request){
        $id = $request->session()->get('kandidat');
        $pass = $request->input('pass');
        $chgpass = $request->input('changepassword');
        $edit = Candidate::find($id);
        $edit->password = Hash::make($pass);
        $edit->save();
        return redirect()->action('CandidateController@dashboard');
    }
    public function daftarcawaka(Request $request){
        $id = $request->session()->get('kandidat');
        $nrp_cawaka = $request->input('nrp_cawaka');
        $edit = Candidate::find($id);
        $edit->nrp_cawaka = $nrp_cawaka;
        $edit->save();
        return redirect()->action('CandidateController@dashboard');
    }
    public function inputpribadi(Request $request){
        $input = new Pribadi;
        $input->nrp = $request->input('nrp');
        $input->foto = $request->input('foto');
        $input->alamat = $request->input('alamat');
        $input->telepon = $request->input('telepon');
        $input->email = $request->input('email');
        $input->tmp_lahir = $request->input('tmp_lahir');
        $input->tgl_lahir = $request->input('tgl_lahir');
        $input->sex = $request->input('sex');
        $input->agama = $request->input('agama');
        $input->ip_1 = $request->input('ip_1');
        $input->ip_2 = $request->input('ip_2');
        $input->save();
        return redirect()->action('CandidateController@dashboard');
    }
    public function pendidikan(Request $request){
        $didik = new Pendidikan;
        $didik->nrp = $request->input('nrp');
        $didik->jenjang_pendidikan = $request->input('jenjang_pendidikan');
        $didik->nama_pendidikan = $request->input('nama_pendidikan');
        $didik->masuk_pendidikan = $request->input('masuk_pendidikan');
        $didik->keluar_pendidikan = $request->input('keluar_pendidikan');
        $didik->save();
        return redirect()->action('CandidateController@dashboard');
    }
    public function prestasi(Request $request){
        $pres = new Prestasi;
        $pres->nrp = $request->input('nrp');
        $pres->nama_prestasi = $request->input('nama_prestasi');
        $pres->peringkat_prestasi = $request->input('peringkat_prestasi');
        $pres->tingkat_prestasi = $request->input('tingkat_prestasi');
        $pres->tahun_prestasi = $request->input('tahun_prestasi');
        $pres->save();
        return redirect()->action('CandidateController@dashboard');
    }
    public function organisasi(Request $request){
        $or = new Organisasi;
        $or->nrp = $request->input('nrp');
        $or->nama_organisasi = $request->input('nama_organisasi');
        $or->jabatan_organisasi = $request->input('jabatan_organisasi');
        $or->awal_organisasi = $request->input('awal_organisasi');
        $or->akhir_organisasi = $request->input('akhir_organisasi');
        $or->save();
        return redirect()->action('CandidateController@dashboard');
    }
    public function pelatihan(Request $request){
        $pe = new Pelatihan;
        $pe->nrp = $request->input('nrp');
        $pe->nama_pelatihan = $request->input('nama_pelatihan');
        $pe->cakupan_pelatihan = $request->input('cakupan_pelatihan');
        $pe->tahun_pelatihan = $request->input('tahun_pelatihan');
        $pe->save();
        return redirect()->action('CandidateController@dashboard');
    }
}
