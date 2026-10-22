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
    Schema::create('qr_tokens', function (Blueprint $table) {
        $table->id();
        $table->foreignId('qr_location_id')->constrained('qr_locations')->onDelete('cascade');
        $table->string('token')->unique();
        $table->timestamp('expires_at');
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
        Schema::dropIfExists('qr_tokens');
    }
};
