<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Imunisasi;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImunisasiController extends Controller
{
    public function index() {
        if (Auth::user()->level == 'ADMIN' || Auth::user()->level == 'PETUGAS') {
            $imunisasi = Imunisasi::join('penduduks', 'imunisasis.nik', '=', 'penduduks.nik')->paginate(5);
        } else {
            $imunisasi = Imunisasi::join('anaks', 'imunisasis.nik', '=', 'anaks.nik')
                            ->join('penduduks', 'imunisasis.nik', '=', 'penduduks.nik')
                            ->where('anaks.nik_orang_tua', session('nik'))->paginate(5);
        }
        
        return view('imunisasi.index', ['imunisasi' => $imunisasi]);
    }
    
    public function tambah() {
        $anak = Anak::all();

        return view('imunisasi.tambah', ['anak' => $anak]);
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
            'imunisasi' => 'required',
            'vitamin' => 'required',
            'tanggal_imunisasi' => 'required',
        ]);

        Imunisasi::create([
            'nik' => $request->nik,
            'imunisasi' => $request->imunisasi,
            'vitamin' => $request->vitamin,
            'tanggal_imunisasi' => $request->tanggal_imunisasi,
        ]);

        return redirect('/imunisasi')->with('message', 'Data baru berhasil di tambahkan.');
    }

    public function ubah(int $id) {
        $anak = Anak::all();
        $imunisasi = Imunisasi::find($id);

        return view('imunisasi.ubah', ['anak' => $anak, 'imunisasi' => $imunisasi]);
    }

    public function prosesUbah(Request $request, int $id) {
        $request->validate([
            'nik' => 'required',
            'imunisasi' => 'required',
            'vitamin' => 'required',
            'tanggal_imunisasi' => 'required',
        ]);

        Imunisasi::find($id)->update([
            'nik' => $request->nik,
            'imunisasi' => $request->imunisasi,
            'vitamin' => $request->vitamin,
            'tanggal_imunisasi' => $request->tanggal_imunisasi,
        ]);

        return redirect('/imunisasi')->with('message', 'Data berhasil di ubah.');
    }

    public function hapus(int $id) {
        $check = Imunisasi::find($id);
    
        if (!$check) {
            return redirect('/imunisasi');
        }
        
        try {
            Imunisasi::destroy($id);
    
            return redirect('/imunisasi')->with('message', 'Data berhasil di hapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/imunisasi');
        }
    }
}
