<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        $user = Auth::user();
        
        if($user){            
            return redirect()->intended('beranda');
        }
        
        return view('login');
    }
    
    public function proses_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        
        $credential = $request->only('username','password');
        
        if(Auth::attempt($credential)){
            $user =  Auth::user();

            session(['nik' => $user->nik]);
            session(['nama' => $user->nama]);
            session(['username' => $user->username]);
                        
            return redirect()->intended('beranda')->with('message', 'Berhasil login.');
        }
        
        return redirect('login')->with('errorMessage', 'Username atau password salah.');
    }
    
    public function logout(Request $request){
        $request->session()->flush();
        
        Auth::logout();
        
        return redirect('login')->with('message', 'Berhasil logout.');
    }
}
