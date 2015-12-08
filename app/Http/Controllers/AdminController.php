<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
class AdminController extends Controller
{
   public function index(Request $request){
        if($request->session()->has('admin')){
            return redirect()->action('AdminController@dashboard');
        }
        else{
            return redirect()->action('LoginAdminController@getlogin');
        }
   }
   public function dashboard(Request $request){
          $hak_akses = 0;
          $data = Candidate::all();
         if($request->session()->has('admin')){
            return view('admin.dashboard',compact('data', 'hak_akses'));
         }
         else{
            return redirect()->action('LoginAdminController@getlogin');   
         }
   }
   public function tambahkandidat(Request $request){
        $input = new Candidate;
        $input->username = $request->input('username');
        $input->password = Hash::make('himitjaya');
        $input->hak_akses = 3;
        $input->nrp_caka = $request->input('nrp_caka');
        $input->nrp_cawaka = $request->input('nrp_cawaka');
        $input->status_upload = 0;
        $input->save();
        return redirect()->action('AdminController@dashboard');
   }
}
