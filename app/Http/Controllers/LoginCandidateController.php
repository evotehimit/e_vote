<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;

class LoginCandidateController extends Controller
{
    public function getlogin(Request $request){
        if($request->session()->has('kandidat')){
            return redirect()->action('CandidateController@index');
        }
        else{
            $hak_akses = 4;
            return view('candidate.login',compact('hak_akses'));
        }
    }

    public function postlogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $data_login = Candidate::where('username', $username)->first();
        if($data_login->count()>0)
        {
            if(Hash::check($password, $data_login->password))
            {
                $request->session()->put('kandidat', $data_login->id);
                return redirect()->action('CandidateController@index');
            }
            else{
                return redirect()->action('LoginCandidateController@getlogin');
            }
        }
        else{
            return redirect()->action('LoginCandidateController@getlogin');
        }
    } 

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->action('CandidateController@index');
    }
}