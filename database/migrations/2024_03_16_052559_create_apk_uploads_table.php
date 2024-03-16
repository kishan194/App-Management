<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apk_uploads', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('app_id');
                $table->string('apk_path');
                $table->string('version_name');
                $table->text('release_notes')->nullable();
                $table->timestamps();
                $table->foreign('app_id')->references('id')->on('app_manages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apk_uploads');
    }
};
