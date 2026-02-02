<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Fasilitas Sekolah', 'description' => 'Pengaduan terkait fasilitas seperti ruang kelas, toilet, dll.']);
        Category::create(['name' => 'Kurikulum dan Pembelajaran', 'description' => 'Pengaduan tentang materi pelajaran, metode mengajar, dll.']);
        Category::create(['name' => 'Tenaga Pendidik', 'description' => 'Pengaduan tentang guru, staf, atau perilaku mereka.']);
        Category::create(['name' => 'Administrasi', 'description' => 'Pengaduan tentang proses administrasi sekolah.']);
        Category::create(['name' => 'Keamanan', 'description' => 'Pengaduan terkait keamanan di lingkungan sekolah.']);
        Category::create(['name' => 'Lainnya', 'description' => 'Pengaduan yang tidak masuk kategori lain.']);
    }
}