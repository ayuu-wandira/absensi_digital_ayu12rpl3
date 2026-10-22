<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('permissions', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // sakit, izin, dispensasi
        $table->date('start_date');
        $table->date('end_date');
        $table->text('reason');
        $table->string('image')->nullable(); // buat simpan foto surat
        $table->string('status')->default('pending'); // pending, approved, rejected
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
