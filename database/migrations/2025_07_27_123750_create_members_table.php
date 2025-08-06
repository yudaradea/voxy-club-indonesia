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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->string('profile_photo');
            $table->string('ktp_sim');
            $table->string('birth_place')->nullable();
            $table->date('birth_date');
            $table->text('address');
            $table->enum('shirt_size', ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']);
            $table->enum('vehicle_type', ['R 80', 'R 90']);
            $table->string('vehicle_color')->nullable();
            $table->year('vehicle_year');
            $table->string('license_plate');
            $table->string('stnk_photo');
            $table->string('car_photo')->nullable();
            $table->text('reason')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->string('jabatan')->default('member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
