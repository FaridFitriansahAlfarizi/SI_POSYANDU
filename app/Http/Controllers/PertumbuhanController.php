<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Penduduk;
use App\Models\Pertumbuhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertumbuhanController extends Controller
{
    public function index() {
        if (Auth::user()->level == 'ADMIN' || Auth::user()->level == 'PETUGAS') {
            $pertumbuhan = Pertumbuhan::join('penduduks', 'pertumbuhans.nik', '=', 'penduduks.nik')->paginate(5);
        } else {
            $pertumbuhan = Pertumbuhan::join('anaks', 'pertumbuhans.nik', '=', 'anaks.nik')
                            ->join('penduduks', 'pertumbuhans.nik', '=', 'penduduks.nik')
                            ->where('anaks.nik_orang_tua', session('nik'))->paginate(5);
        }
        
        return view('pertumbuhan.index', ['pertumbuhan' => $pertumbuhan]);
    }

    public function tambah() {
        $anak = Anak::all();

        return view('pertumbuhan.tambah', ['anak' => $anak]);
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
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'umur' => 'required',
            'tanggal_posyandu' => 'required',
        ]);

        Pertumbuhan::create([
            'nik' => $request->nik,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'umur' => $request->umur,
            'tanggal_posyandu' => $request->tanggal_posyandu,
        ]);

        return redirect('/pertumbuhan')->with('message', 'Data baru berhasil di tambahkan.');
    }

    public function ubah(int $id) {
        $anak = Anak::all();
        $pertumbuhan = Pertumbuhan::find($id);

        return view('pertumbuhan.ubah', ['anak' => $anak, 'pertumbuhan' => $pertumbuhan]);
    }

    public function prosesUbah(Request $request, int $id) {
        $request->validate([
            'nik' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'umur' => 'required',
            'tanggal_posyandu' => 'required',
        ]);

        Pertumbuhan::find($id)->update([
            'nik' => $request->nik,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'umur' => $request->umur,
            'tanggal_posyandu' => $request->tanggal_posyandu,
        ]);

        return redirect('/pertumbuhan')->with('message', 'Data berhasil di ubah.');
    }

    public function hapus(int $id) {
        $check = Pertumbuhan::find($id);
    
        if (!$check) {
            return redirect('/pertumbuhan');
        }
        
        try {
            Pertumbuhan::destroy($id);
    
            return redirect('/pertumbuhan')->with('message', 'Data berhasil di hapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/pertumbuhan');
        }
    }
}
