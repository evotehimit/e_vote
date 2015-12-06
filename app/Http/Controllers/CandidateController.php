<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Pribadi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Validator;
use Input;

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
            return view('candidate.dashboard', compact(
                'data',
                'hak_akses',
                'pribadika',
                'pribadiwaka',
                'cekcaka',
                'cekcawaka'
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
        $file = Input::file('image');
        $filename = str_random(25).'-'.$file->getClientOriginalName();
        $destinationPath = 'foto_kandidat/';
        $file->move($destinationPath, $filename);
        $input->foto = $filename;
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
}
