<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\OrangTua;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    public function orangtua() {
        $orangtua = OrangTua::leftJoin('penduduks', 'penduduks.nik', '=', 'orang_tuas.nik')->paginate(5);

        return view('data.orangtua.index', ['orangtua' => $orangtua]);
    }

    public function tambahOrangTua() {
        $penduduk = Penduduk::all();

        return view('data.orangtua.tambah', ['penduduk' => $penduduk]);
    }

    public function getPendudukByNikOT(string $nik) {
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

    public function prosesTambahOrangTua(Request $request) {
        $request->validate([
            'nik' => 'required',
            'nik_anak' => 'required',
        ]);

        OrangTua::create([
            'nik' => $request->nik,
        ]);

        Anak::create([
            'nik' => $request->nik_anak,
            'nik_orang_tua' => $request->nik,
        ]);

        return redirect('/data/orangtua')->with('message', 'Data baru berhasil di tambahkan.');
    }

    public function detailOrangTua(string $nik) {
        $orangtua = OrangTua::leftJoin('penduduks', 'penduduks.nik', '=', 'orang_tuas.nik')->find($nik);

        return view('data.orangtua.detail', ['orangtua' => $orangtua]);
    }

    public function hapusOrangTua(string $nik) {
        $check = OrangTua::find($nik);
    
        if (!$check) {
            return redirect('/data/orangtua');
        }
        
        try {
            OrangTua::destroy($nik);
    
            return redirect('/data/orangtua')->with('message', 'Data berhasil di hapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/data/orangtua');
        }
    }
}
