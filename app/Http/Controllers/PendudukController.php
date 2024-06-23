<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function penduduk(){
        $penduduk = Penduduk::paginate(5);

        return view('data.penduduk.index', ['penduduks' => $penduduk]);
    }

    public function tambahPenduduk(){
        return view('data.penduduk.tambah');
    }

    public function prosesTambahPenduduk(Request $request) {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenis_pekerjaan' => 'required',
            // 'golongan_darah' => 'required',
            'status_perkawinan' => 'required',
            // 'tanggal_perkawinan' => 'required',
            'status_hubungan_keluarga' => 'required',
            'kewarganegaraan' => 'required',
            // 'username' => 'required',
            // 'password' => 'required',
        ]);

        Penduduk::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'golongan_darah' => $request->golongan_darah,
            'status_perkawinan' => $request->status_perkawinan,
            'tanggal_perkawinan' => $request->tanggal_perkawinan,
            'status_hubungan_keluarga' => $request->status_hubungan_keluarga,
            'kewarganegaraan' => $request->kewarganegaraan,
            'username' => $request->nik,
            'password' => bcrypt($request->nik),
            'level' => 'PENDUDUK',
        ]);

        return redirect('/data/penduduk')->with('message', 'Data baru berhasil di tambahkan.');
    }

    public function detailPenduduk(string $nik) {
        $penduduk = Penduduk::find($nik);

        return view('data.penduduk.detail', ['penduduks' => $penduduk]);
    }

    public function ubahPenduduk(string $nik) {
        $penduduk = Penduduk::find($nik);

        return view('data.penduduk.ubah', ['penduduks' => $penduduk]);
    }

    public function prosesUbahPenduduk(Request $request, string $nik) {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenis_pekerjaan' => 'required',
            // 'golongan_darah' => 'required',
            'status_perkawinan' => 'required',
            // 'tanggal_perkawinan' => 'required',
            'status_hubungan_keluarga' => 'required',
            'kewarganegaraan' => 'required',
            // 'username' => 'required',
            // 'password' => 'required',
        ]);
        
        Penduduk::find($nik)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'golongan_darah' => $request->golongan_darah,
            'status_perkawinan' => $request->status_perkawinan,
            'tanggal_perkawinan' => $request->tanggal_perkawinan,
            'status_hubungan_keluarga' => $request->status_hubungan_keluarga,
            'kewarganegaraan' => $request->kewarganegaraan,
            // 'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : Penduduk::find($nik)->password,
            'level' => 'PENDUDUK',
        ]);

        return redirect('/data/penduduk')->with('message', 'Data berhasil di ubah.');
    }
}
