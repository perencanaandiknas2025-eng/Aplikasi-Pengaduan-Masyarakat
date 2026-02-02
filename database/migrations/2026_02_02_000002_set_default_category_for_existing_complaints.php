<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Set default category_id = 6 (Lainnya) untuk complaints yang null
        DB::table('complaint')->whereNull('category_id')->update(['category_id' => 6]);
    }

    public function down()
    {
        // Revert: set back to null
        DB::table('complaint')->where('category_id', 6)->update(['category_id' => null]);
    }
};