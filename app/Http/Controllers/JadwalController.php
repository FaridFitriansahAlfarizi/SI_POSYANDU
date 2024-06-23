<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request) {
        date_default_timezone_set('Asia/Jakarta');
        
        $currentMonth = $request->query('month', Carbon::now()->format('Y-m'));
        $startOfMonth = Carbon::parse($currentMonth)->startOfMonth();
        $endOfMonth = Carbon::parse($currentMonth)->endOfMonth();

        $startOfWeek = $startOfMonth->copy()->startOfWeek();
        $endOfWeek = $endOfMonth->copy()->endOfWeek();

        $dates = [];
        $date = $startOfWeek->copy();

        while ($date->lte($endOfWeek)) {
            $dates[] = $date->copy();
            $date->addDay();
        }

        $today = Carbon::now()->toDateString();

        $jadwal = Jadwal::all();
        
        return view('jadwal.index', ['dates' => $dates, 'today' => $today, 'startOfMonth' => $startOfMonth, 'jadwal' => $jadwal]);
    }

    public function prosesTambah(Request $request) {
        $request->validate([
            'tanggal_kegiatan' => 'required',
            'kegiatan' => 'required',
        ]);

        Jadwal::create([
            'nik' => session('nik'),
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'kegiatan' => $request->kegiatan,
        ]);

        return redirect('/jadwal')->with('message', 'Jadwal baru berhasil di buat.');
    }

    public function getJadwalByTanggal(Request $request) {
        $tanggal = $request->query('tanggal');

        $jadwal = Jadwal::where('tanggal_kegiatan', $tanggal)->first();
        
        if ($jadwal) {
            return response()->json([
                'kegiatan' => $jadwal->kegiatan,
            ]);
        }
    }

    public function hapus(Request $request) {
        $tanggal = $request->query('tanggal');

        $check = Jadwal::where('tanggal_kegiatan', $tanggal)->first();
    
        if (!$check) {
            return redirect('/jadwal');
        }
        
        try {
            $check->delete();
    
            return redirect('/jadwal')->with('message', 'Jadwal berhasil di hapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/jadwal');
        }
    }
}
