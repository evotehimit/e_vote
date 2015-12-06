<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

   }
}
