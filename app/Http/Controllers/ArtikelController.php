<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index() {
        $artikel = Artikel::all();
        
        return view('artikel.index', ['artikel' => $artikel]);
    }

    public function tambah() {
        return view('artikel.tambah');
    }

    public function prosesTambah(Request $request) {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $imagePath = $request->file('gambar')->store('artikel', 'public');

        Artikel::create([
            'nik' => session('nik'),
            'gambar' => $imagePath,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect('/artikel')->with('message', 'Artikel baru berhasil di buat.');
    }

    public function detail(int $id) {
        $artikel = Artikel::find($id);

        return view('artikel.detail', ['artikel' => $artikel]);
    }

    public function hapus(int $id) {
        $check = Artikel::find($id);
    
        if (!$check) {
            return redirect('/artikel');
        }
        
        try {
            Storage::delete('public/' . $check->gambar);

            Artikel::destroy($id);
    
            return redirect('/artikel')->with('message', 'Artikel berhasil di hapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/artikel');
        }
    }
}
