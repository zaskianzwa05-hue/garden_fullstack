<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterController {
 public function index(){ return view('user.register'); }
 public function proses(Request $r){ $d=$r->validate(['nama'=>'required|max:100','email'=>'required|email|unique:users,email','password'=>'required|min:8|confirmed','no_hp'=>'required|max:20']); $u=User::create(['nama'=>$d['nama'],'email'=>$d['email'],'password'=>$d['password'],'role'=>'user','no_hp'=>$d['no_hp']]); Auth::login($u); return redirect('/'); }
}
