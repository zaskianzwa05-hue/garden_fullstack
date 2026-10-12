<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController {
 public function index(){ return view('user.login'); }
 public function proses(Request $r){ $r->validate(['email'=>'required|email','password'=>'required']); if(Auth::attempt(['email'=>$r->email,'password'=>$r->password])){ $r->session()->regenerate(); return auth()->user()->role==='admin'?redirect('/admin'):redirect('/'); } return back()->withInput($r->only('email'))->with('error','Email atau password salah.'); }
 public function logout(Request $r){ Auth::logout(); $r->session()->invalidate(); $r->session()->regenerateToken(); return redirect('/'); }
}
