<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\QrLocation;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        // Data Kelas
        $class = ClassRoom::create([
            'name' => 'XII RPL 3',
        ]);

        // Data Siswa
        Student::create([
            'nisn' => '0051234567',
            'name' => 'Ayu',
            'gender' => 'P',
            'address' => 'Jl. Merdeka No. 10',
        ]);

        // Data Lokasi QR
        QrLocation::create([
            'name' => 'Gerbang Utama',
            'latitude' => -6.20000000,
            'longitude' => 106.81666670,
            'radius' => 50,
        ]);
    }
}