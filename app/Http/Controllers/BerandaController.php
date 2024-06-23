<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Imunisasi;
use App\Models\OrangTua;
use App\Models\Penduduk;
use App\Models\Pertumbuhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index(){
        $orangtua = OrangTua::count();
        $anak = Anak::count();
        
        $jenis_kelamin = Anak::join('penduduks as p', 'anaks.nik', '=', 'p.nik')
                            ->select('jenis_kelamin', DB::raw('count(*) as total'))
                            ->groupBy('jenis_kelamin')->get();

        $imunisasiCounts = Imunisasi::select('tanggal_imunisasi', DB::raw('count(*) as total'))
                            ->groupBy('tanggal_imunisasi')->get();
                            
        $profil_orangtua = Penduduk::where('nik', session('nik'))->first();
        $profil_anak = Anak::join('penduduks as p', 'anaks.nik', '=', 'p.nik')->where('nik_orang_tua', session('nik'))->get();

        return view('beranda.index', [
            'orangtua' => $orangtua,
            'anak' => $anak,
            'jenis_kelamin' => $jenis_kelamin,
            'imunisasiCounts' => $imunisasiCounts,
            'profil_orangtua' => $profil_orangtua,
            'profil_anak' => $profil_anak,
        ]);
    }

    public function profil_orangtua(string $nik) {
        $penduduk = Penduduk::find($nik);

        return view('beranda.profil.orangtua.index', ['penduduks' => $penduduk]);
    }

    public function profil_anak(string $nik) {
        $penduduk = Penduduk::find($nik);

        return view('beranda.profil.anak.index', ['penduduks' => $penduduk]);
    }

    public function grafik_anak(string $nik) {
        $data = Pertumbuhan::orderBy('tanggal_posyandu')->where('nik', $nik)->get();
        
        $tanggal_posyandu = $data->pluck('tanggal_posyandu');
        $berat_badan = $data->pluck('berat_badan');
        $tinggi_badan = $data->pluck('tinggi_badan');

        return view('beranda.grafik.anak.index', [
            'tanggal_posyandu' => $tanggal_posyandu,
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
        ]);
    }

    public function gantiPassword(Request $request, string $nik) {
        $request->validate([
            'password' => 'required',
        ]);

        Penduduk::find($nik)->update([
            'password' => $request->password ? bcrypt($request->password) : Penduduk::find($nik)->password,
        ]);

        return redirect()->back()->with('message', 'Password berhasil di ganti.');
    }
}
