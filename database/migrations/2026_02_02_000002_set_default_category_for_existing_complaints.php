<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Insert categories if not exist
        $categories = [
            ['name' => 'Fasilitas Sekolah', 'description' => 'Pengaduan terkait fasilitas sekolah'],
            ['name' => 'Kurikulum dan Pembelajaran', 'description' => 'Pengaduan terkait kurikulum dan pembelajaran'],
            ['name' => 'Tenaga Pendidik', 'description' => 'Pengaduan terkait tenaga pendidik'],
            ['name' => 'Administrasi', 'description' => 'Pengaduan terkait administrasi'],
            ['name' => 'Keamanan', 'description' => 'Pengaduan terkait keamanan'],
            ['name' => 'Lainnya', 'description' => 'Pengaduan lainnya'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['name' => $category['name']],
                $category
            );
        }

        // Set default category_id = 6 (Lainnya) untuk complaints yang null
        DB::table('complaint')->whereNull('category_id')->update(['category_id' => 6]);
    }

    public function down()
    {
        // Revert: set back to null
        DB::table('complaint')->where('category_id', 6)->update(['category_id' => null]);
        // Optionally delete categories, but better not
    }
};