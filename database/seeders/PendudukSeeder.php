<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penduduks')->insert([
            [
                'nik' => '1234567890123456',
                'nama' => 'BUDI SANTOSO',
                'jenis_kelamin' => 'LAKI-LAKI',
                'tempat_lahir' => 'JAKARTA',
                'tanggal_lahir' => '01/01/1990',
                'agama' => 'ISLAM',
                'pendidikan' => 'DIPLOMA IV / STRATA I',
                'jenis_pekerjaan' => 'KARYAWAN SWASTA',
                'golongan_darah' => 'O',
                'status_perkawinan' => 'BELUM KAWIN',
                'tanggal_perkawinan' => null,
                'status_hubungan_keluarga' => 'ANAK',
                'kewarganegaraan' => 'WNI',
                'username' => '1234567890123456',
                'password' => Hash::make('1234567890123456'),
                'level' => 'PENDUDUK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '2345678901234567',
                'nama' => 'SITI AMINAH',
                'jenis_kelamin' => 'PEREMPUAN',
                'tempat_lahir' => 'BANDUNG',
                'tanggal_lahir' => '15/05/1985',
                'agama' => 'KRISTEN',
                'pendidikan' => 'STRATA II',
                'jenis_pekerjaan' => 'GURU',
                'golongan_darah' => 'A',
                'status_perkawinan' => 'KAWIN',
                'tanggal_perkawinan' => '20/06/2010',
                'status_hubungan_keluarga' => 'ISTRI',
                'kewarganegaraan' => 'WNI',
                'username' => '2345678901234567',
                'password' => Hash::make('2345678901234567'),
                'level' => 'PETUGAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3456789012345678',
                'nama' => 'AGUS RIYANTO',
                'jenis_kelamin' => 'LAKI-LAKI',
                'tempat_lahir' => 'SURABAYA',
                'tanggal_lahir' => '30/12/1978',
                'agama' => 'HINDU',
                'pendidikan' => 'SLTA / SEDERAJAT',
                'jenis_pekerjaan' => 'WIRASWASTA',
                'golongan_darah' => 'B',
                'status_perkawinan' => 'KAWIN',
                'tanggal_perkawinan' => '15/03/2005',
                'status_hubungan_keluarga' => 'SUAMI',
                'kewarganegaraan' => 'WNI',
                'username' => '3456789012345678',
                'password' => Hash::make('3456789012345678'),
                'level' => 'ADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
