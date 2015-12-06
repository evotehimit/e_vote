<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;

class LoginAdminController extends Controller
{
   public function getlogin(Request $request){
        $hak_akses = 4;
        if($request->session()->has('admin')){
            return redirect()->action('AdminController@dashboard');
        }
        else{
            return view('admin.login',compact('hak_akses'));
        }
   }
   public function postlogin(Request $request){
        $nrp = $request->input('nrp');
        $pass = $request->input('password');
        $admin = User::first();
        if($admin->where('nrp', $nrp)->count()>0){
            if(Hash::check($pass, $admin->password)){
                $request->session()->put('admin', $request->input('nrp'));
                return redirect()->action('AdminController@dashboard');
            }
            else{
                return redirect()->action('LoginAdminController@getlogin');
            }
        }
        else{
            return redirect()->action('LoginAdminController@getlogin');
        }
   }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->action('AdminController@index');
    }
}
