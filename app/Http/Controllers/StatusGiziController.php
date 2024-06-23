<?php

namespace App\Http\Controllers;

use App\Models\StatusGizi;
use App\Models\Pertumbuhan;
use Illuminate\Http\Request;

class StatusGiziController extends Controller
{
    public function index() {
        $statusgizi = StatusGizi::join('pertumbuhans', 'status_gizis.id_pertumbuhan', '=', 'pertumbuhans.id')
                    ->join('penduduks', 'pertumbuhans.nik', '=', 'penduduks.nik')
                    ->select('status_gizis.*', 'pertumbuhans.*', 'penduduks.nama as nama_anak')
                    ->orderby('status_gizis.id', 'asc')->paginate(5);
        
        return view('statusgizi.index', ['statusgizi' => $statusgizi]);
    }

    public function updateData() {
        StatusGizi::truncate();

        $hasil = $this->proses_SAW();
        
        $index = 1;
        foreach ($hasil['hasil'] as $nama => $data) {
            StatusGizi::create([
                'id_pertumbuhan' => $data['id'],
                'ranking' => $index,
            ]);
            $index++;
        }
        
        return redirect('/statusgizi')->with('message', 'Data berhasil di update.');
    }

    public function saw() {
        $data = $this->proses_SAW();

        return view('statusgizi.saw.index', [
            'matrixKeputusan' => $data['matrixKeputusan'],
            'matrixNormalisasi' => $data['matrixNormalisasi'],
            'matrixTerbobot' => $data['matrixTerbobot'],
            'hasil' => $data['hasil'],
        ]);
    }

    public function proses_SAW() {
        $pertumbuhan = Pertumbuhan::join('penduduks', 'pertumbuhans.nik', '=', 'penduduks.nik')->get();
        $kriteria = [
            ['nama_kriteria' => 'berat_badan', 'bobot' => 0.3],
            ['nama_kriteria' => 'tinggi_badan', 'bobot' => 0.4],
            ['nama_kriteria' => 'umur', 'bobot' => 0.3],
        ];

        // Step 1: Matriks Keputusan Awal
        $matrixKeputusan = [];
        foreach ($pertumbuhan as $p) {
            $matrixKeputusan[] = [
                'nama' => $p->nama,
                'berat_badan' => $p->berat_badan,
                'tinggi_badan' => $p->tinggi_badan,
                'umur' => $p->umur,
            ];
        }

        // Step 2: Matriks Normalisasi
        $matrixNormalisasi = [];
        foreach ($kriteria as $k) {
            $max = Pertumbuhan::max($k['nama_kriteria']);
            foreach ($pertumbuhan as $p) {
                $matrixNormalisasi[$p->id][$k['nama_kriteria']] = $p->{$k['nama_kriteria']} / $max;
            }
        }

        // Step 3: Matriks Ternormalisasi Terbobot
        $matrixTerbobot = [];
        foreach ($pertumbuhan as $p) {
            foreach ($kriteria as $k) {
                $matrixTerbobot[$p->id][$k['nama_kriteria']] = $matrixNormalisasi[$p->id][$k['nama_kriteria']] * $k['bobot'];
            }
        }

        // Step 4: Menghitung Nilai Preferensi
        $nilaiPreferensi = [];
        foreach ($pertumbuhan as $p) {
            $total = 0;
            foreach ($kriteria as $k) {
                $total += $matrixTerbobot[$p->id][$k['nama_kriteria']];
            }
            $nilaiPreferensi[$p->id] = $total;
        }

        // Mencari nilai minimum dan maksimum dari nilai preferensi
        $nilaiMin = min($nilaiPreferensi);
        $nilaiMax = max($nilaiPreferensi);
        $rentang = ($nilaiMax - $nilaiMin) / 3;

        // Menentukan status berdasarkan rentang nilai
        $hasil = [];
        foreach ($pertumbuhan as $p) {
            $total = $nilaiPreferensi[$p->id];
            $persentase = $total * 100;
            $status = '';
            if ($total > $nilaiMin + 2 * $rentang) {
                $status = 'Gizi Baik';
            } elseif ($total > $nilaiMin + $rentang) {
                $status = 'Gizi Sedang';
            } else {
                $status = 'Gizi Kurang';
            }
            $hasil[$p->id] = [
                'id' => $p->id,
                'nama' => $p->nama,
                'nik' => $p->nik,
                'nilai_preferensi' => $total,
                'persentase' => $persentase,
                'status' => $status,
            ];
        }

        // Mengurutkan hasil dari nilai preferensi terkecil ke terbesar
        uasort($hasil, function ($a, $b) {
            return $a['nilai_preferensi'] <=> $b['nilai_preferensi'];
        });

        return [
            'matrixKeputusan' => $matrixKeputusan,
            'matrixNormalisasi' => $matrixNormalisasi,
            'matrixTerbobot' => $matrixTerbobot,
            'hasil' => $hasil,
        ];
    }

    public function moora() {
        $pertumbuhan = Pertumbuhan::join('penduduks', 'pertumbuhans.nik', '=', 'penduduks.nik')->get();
        $kriteria = [
            ['nama_kriteria' => 'berat_badan', 'bobot' => 0.3],
            ['nama_kriteria' => 'tinggi_badan', 'bobot' => 0.4],
            ['nama_kriteria' => 'umur', 'bobot' => 0.3],
        ];

        // Step 1: Matriks Keputusan Awal
        $matrixKeputusan = [];
        foreach ($pertumbuhan as $p) {
            $matrixKeputusan[] = [
                'nama' => $p->nama,
                'berat_badan' => $p->berat_badan,
                'tinggi_badan' => $p->tinggi_badan,
                'umur' => $p->umur,
            ];
        }

        // Step 2: Matriks Normalisasi
        $matrixNormalisasi = [];
        foreach ($kriteria as $k) {
            $sumSquares = 0;
            foreach ($pertumbuhan as $p) {
                $sumSquares += pow($p->{$k['nama_kriteria']}, 2);
            }
            $normalizationDenominator = sqrt($sumSquares);
            foreach ($pertumbuhan as $p) {
                $matrixNormalisasi[$p->id][$k['nama_kriteria']] = $p->{$k['nama_kriteria']} / $normalizationDenominator;
            }
        }

        // Step 3: Matriks Ternormalisasi Terbobot
        $matrixTerbobot = [];
        foreach ($pertumbuhan as $p) {
            foreach ($kriteria as $k) {
                $matrixTerbobot[$p->id][$k['nama_kriteria']] = $matrixNormalisasi[$p->id][$k['nama_kriteria']] * $k['bobot'];
            }
        }

        // Step 4: Menghitung Nilai Optimasi
        $hasil = [];
        $nilaiPreferensi = [];
        foreach ($pertumbuhan as $p) {
            $total = 0;
            foreach ($kriteria as $k) {
                $total += $matrixTerbobot[$p->id][$k['nama_kriteria']];
            }
            $nilaiPreferensi[$p->id] = $total;
        }

        // Mencari nilai minimum dan maksimum dari nilai optimasi
        $nilaiMin = min($nilaiPreferensi);
        $nilaiMax = max($nilaiPreferensi);
        $rentang = ($nilaiMax - $nilaiMin) / 3;

        // Menentukan status berdasarkan rentang nilai
        foreach ($pertumbuhan as $p) {
            $total = $nilaiPreferensi[$p->id];
            $persentase = $total * 100;
            $status = '';
            if ($total > $nilaiMin + 2 * $rentang) {
                $status = 'Gizi Baik';
            } elseif ($total > $nilaiMin + $rentang) {
                $status = 'Gizi Sedang';
            } else {
                $status = 'Gizi Kurang';
            }
            $hasil[$p->id] = [
                'nama' => $p->nama,
                'nilai_preferensi' => $total,
                'persentase' => $persentase,
                'status' => $status,
            ];
        }

        // Mengurutkan hasil dari nilai optimasi terkecil ke terbesar
        uasort($hasil, function ($a, $b) {
            return $a['nilai_preferensi'] <=> $b['nilai_preferensi'];
        });

        return view('statusgizi.moora.index', [
            'matrixKeputusan' => $matrixKeputusan,
            'matrixNormalisasi' => $matrixNormalisasi,
            'matrixTerbobot' => $matrixTerbobot,
            'hasil' => $hasil,
        ]);
    }
}
