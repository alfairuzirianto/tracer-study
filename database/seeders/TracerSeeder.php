<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TracerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tracer')->insert([
            [
                'nim' => '062040831003', 
                'status' => 'Lanjut Studi',
                'waktu_tunggu' => 1,
                'nama_instansi' => 'Universitas Indonesia',
                'kota_instansi' => 'Jakarta',
                'alamat_instansi' => 'Jl. Salemba Raya No. 4, Jakarta Pusat',
                'jenis_instansi' => 'instansi pemerintah',
                'jabatan' => 'Mahasiswa',
                'pendapatan' => 0, 
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062040831005', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 3,
                'nama_instansi' => 'PT. Inovasi Digital Nusantara',
                'kota_instansi' => 'Malang',
                'alamat_instansi' => 'Jl. Industri No. 20, Malang',
                'jenis_instansi' => 'instansi swasta',
                'jabatan' => 'Junior Programmer',
                'pendapatan' => 5000000,
                'keselarasan' => 'Erat'
            ],
            [
                'nim' => '062040841004', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 2,
                'nama_instansi' => 'Tech Solutions Corp.',
                'kota_instansi' => 'Semarang',
                'alamat_instansi' => 'Jl. Raya Utama No. 100, Semarang',
                'jenis_instansi' => 'instansi swasta',
                'jabatan' => 'Data Analyst',
                'pendapatan' => 6500000,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062040841005', 
                'status' => 'Wiraswasta',
                'waktu_tunggu' => 0,
                'nama_instansi' => 'Peter\'s Creative Agency',
                'kota_instansi' => 'Malang',
                'alamat_instansi' => 'Jl. Kreatifitas No. 5, Malang',
                'jenis_instansi' => 'Wiraswasta/Usaha sendiri',
                'jabatan' => 'Creative Director',
                'pendapatan' => 8000000,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062040841006', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 4,
                'nama_instansi' => 'PT. Maju Bersama Teknologi',
                'kota_instansi' => 'Medan',
                'alamat_instansi' => 'Jl. Telekomunikasi No. 7, Medan',
                'jenis_instansi' => 'BUMN/BUMD',
                'jabatan' => 'IT Support Specialist',
                'pendapatan' => 4500000,
                'keselarasan' => 'Cukup Erat'
            ],
            [
                'nim' => '062040841008', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 1,
                'nama_instansi' => 'Global Software House',
                'kota_instansi' => 'Makassar',
                'alamat_instansi' => 'Jl. Digitalisasi No. 1, Makassar',
                'jenis_instansi' => 'instansi swasta',
                'jabatan' => 'Web Developer',
                'pendapatan' => 7000000,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062140831000', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 2,
                'nama_instansi' => 'PT. Solusi Informatika Mandiri',
                'kota_instansi' => 'Jakarta',
                'alamat_instansi' => 'Jl. Teknologi No. 10, Jakarta Pusat',
                'jenis_instansi' => 'instansi swasta',
                'jabatan' => 'IT Administrator',
                'pendapatan' => 5500000,
                'keselarasan' => 'Erat'
            ],
            [
                'nim' => '062140831001', 
                'status' => 'Lanjut Studi',
                'waktu_tunggu' => 0,
                'nama_instansi' => 'Politeknik Negeri Bandung',
                'kota_instansi' => 'Bandung',
                'alamat_instansi' => 'Jl. Gegerkalong Hilir, Bandung',
                'jenis_instansi' => 'instansi pemerintah',
                'jabatan' => 'Mahasiswa',
                'pendapatan' => 0,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062140831002', 
                'status' => 'Belum Bekerja',
                'waktu_tunggu' => 6,
                'nama_instansi' => 'Tidak Ada',
                'kota_instansi' => 'Tidak Ada',
                'alamat_instansi' => 'Tidak Ada',
                'jenis_instansi' => 'Tidak Ada',
                'jabatan' => 'Tidak Ada',
                'pendapatan' => 0,
                'keselarasan' => 'Tidak Erat' 
            ],
            [
                'nim' => '062140831004', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 1,
                'nama_instansi' => 'CV. Jaya Digital',
                'kota_instansi' => 'Semarang',
                'alamat_instansi' => 'Jl. Perintis Kemerdekaan No. 20, Semarang',
                'jenis_instansi' => 'Wiraswasta/Usaha sendiri',
                'jabatan' => 'Network Technician',
                'pendapatan' => 4800000,
                'keselarasan' => 'Erat'
            ],
            [
                'nim' => '062140831008', 
                'status' => 'Wiraswasta',
                'waktu_tunggu' => 0,
                'nama_instansi' => 'Kopi Digital Creative',
                'kota_instansi' => 'Makassar',
                'alamat_instansi' => 'Jl. Usaha Bersama No. 1, Makassar',
                'jenis_instansi' => 'Wiraswasta/Usaha sendiri',
                'jabatan' => 'Freelance Web Designer',
                'pendapatan' => 6000000,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062140841003', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 0,
                'nama_instansi' => 'Bank Mandiri',
                'kota_instansi' => 'Yogyakarta',
                'alamat_instansi' => 'Jl. Sudirman No. 50, Yogyakarta',
                'jenis_instansi' => 'BUMN/BUMD',
                'jabatan' => 'IT Support',
                'pendapatan' => 7500000,
                'keselarasan' => 'Erat'
            ],
            [
                'nim' => '062140841004', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 3,
                'nama_instansi' => 'PT. Solusi Cerdas Indonesia',
                'kota_instansi' => 'Semarang',
                'alamat_instansi' => 'Jl. Pemuda No. 12, Semarang',
                'jenis_instansi' => 'instansi swasta',
                'jabatan' => 'Software Engineer',
                'pendapatan' => 8500000,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062140841005', 
                'status' => 'Lanjut Studi',
                'waktu_tunggu' => 0,
                'nama_instansi' => 'Universitas Gadjah Mada',
                'kota_instansi' => 'Yogyakarta',
                'alamat_instansi' => 'Jl. Teknika Utara, Yogyakarta',
                'jenis_instansi' => 'instansi pemerintah',
                'jabatan' => 'Mahasiswa',
                'pendapatan' => 0,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062140841006', 
                'status' => 'Wiraswasta',
                'waktu_tunggu' => 1,
                'nama_instansi' => 'Raka IT Consultant',
                'kota_instansi' => 'Medan',
                'alamat_instansi' => 'Jl. Veteran No. 8, Medan',
                'jenis_instansi' => 'Wiraswasta/Usaha sendiri',
                'jabatan' => 'IT Consultant',
                'pendapatan' => 9000000,
                'keselarasan' => 'Sangat Erat'
            ],
            [
                'nim' => '062140841007', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 0,
                'nama_instansi' => 'PT. Karya Cipta Solusi',
                'kota_instansi' => 'Palembang',
                'alamat_instansi' => 'Jl. Demang Lebar Daun No. 20, Palembang',
                'jenis_instansi' => 'instansi swasta',
                'jabatan' => 'System Analyst',
                'pendapatan' => 7200000,
                'keselarasan' => 'Erat'
            ],
            [
                'nim' => '062140841008', 
                'status' => 'Bekerja',
                'waktu_tunggu' => 4,
                'nama_instansi' => 'Pemerintah Kota Makassar',
                'kota_instansi' => 'Makassar',
                'alamat_instansi' => 'Jl. Balaikota No. 1, Makassar',
                'jenis_instansi' => 'instansi pemerintah',
                'jabatan' => 'Staf IT',
                'pendapatan' => 6000000,
                'keselarasan' => 'Cukup Erat'
            ]
        ]);
    }
}
