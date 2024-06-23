<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function petugas(){
        $petugas = Penduduk::where('level', 'PETUGAS')->paginate(5);

        return view('data.petugas.index', ['petugas' => $petugas]);
    }

    public function tambahPetugas(){
        $penduduk = Penduduk::where('level', 'PENDUDUK')->select('nik')->get();

        return view('data.petugas.tambah', ['penduduk' => $penduduk]);
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

    public function prosesTambahPetugas(string $nik) {
        Penduduk::find($nik)->update([
            'level' => 'PETUGAS',
        ]);

        return redirect('/data/petugas')->with('message', 'Petugas baru berhasil di tambahkan.');
    }

    public function hapusPetugas(string $nik) {
        Penduduk::find($nik)->update([
            'level' => 'PENDUDUK',
        ]);

        return redirect('/data/petugas')->with('message', 'Petugas berhasil di nonaktifkan.');
    }
}
