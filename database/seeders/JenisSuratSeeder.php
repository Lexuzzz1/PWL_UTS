<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('jenis_surat')->insert([
        ['jenis_surat' => 'Surat Keterangan Mahasiswa Aktif'],
        ['jenis_surat' => 'Surat Pengantar Tugas Mata Kuliah'],
        ['jenis_surat' => 'Surat Keterangan Lulus'],
        ['jenis_surat' => 'Surat Laporan Hasil Studi'],
    ]);
}

}
