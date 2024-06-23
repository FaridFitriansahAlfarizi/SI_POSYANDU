<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\OrangTua;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function index() {
        $anak = Anak::join('penduduks as p', 'anaks.nik', '=', 'p.nik')
                ->join('penduduks as pe', 'anaks.nik_orang_tua', '=', 'pe.nik')
                ->select('anaks.*', 'p.*', 'pe.nama as nama_orang_tua')->paginate(5);
        
        return view('data.anak.index', ['anak' => $anak]);
    }

    public function tambah() {
        $penduduk = Penduduk::all();

        return view('data.anak.tambah', ['penduduk' => $penduduk]);
    }

    public function getPendudukByNik(string $nik) {
        $penduduk = Penduduk::where('nik', $nik)->first();
        
        if ($penduduk) {
            return response()->json([
                'nama' => $penduduk->nama,
                'jenis_kelamin' => $penduduk->jenis_kelamin,
                'tempat_lahir' => $penduduk->tempat_lahir,
                'tanggal_lahir' => $penduduk->tanggal_lahir,
                'agama' => $penduduk->agama,
                'pendidikan' => $penduduk->pendidikan,
                'jenis_pekerjaan' => $penduduk->jenis_pekerjaan,
                'golongan_darah' => $penduduk->golongan_darah,
                'status_perkawinan' => $penduduk->status_perkawinan,
                'tanggal_perkawinan' => $penduduk->tanggal_perkawinan,
                'status_hubungan_keluarga' => $penduduk->status_hubungan_keluarga,
                'kewarganegaraan' => $penduduk->kewarganegaraan,
                'username' => $penduduk->username,
                'password' => $penduduk->password,
            ]);
        }
    }

    public function prosesTambah(Request $request) {
        $request->validate([
            'nik' => 'required',
            'nik_anak' => 'required',
        ]);

        Anak::create([
            'nik' => $request->nik_anak,
            'nik_orang_tua' => $request->nik,
        ]);

        return redirect('/data/anak')->with('message', 'Data baru berhasil di tambahkan.');
    }

    public function detail(string $nik) {
        $anak = Anak::leftJoin('penduduks', 'penduduks.nik', '=', 'anaks.nik')->find($nik);

        return view('data.anak.detail', ['anak' => $anak]);
    }

    public function hapus(string $nik) {
        $check = Anak::find($nik);
    
        if (!$check) {
            return redirect('/data/anak');
        }
        
        try {
            Anak::destroy($nik);
    
            return redirect('/data/anak')->with('message', 'Data berhasil di hapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/data/anak');
        }
    }
}
