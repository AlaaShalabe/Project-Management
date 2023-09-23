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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_specialty_id')->constrained('sub_specialties');
            $table->foreignId('shift_id')->constrained('shifts');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('join_date');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('address');
            $table->enum('gender', ['male', 'female']);
            $table->enum('status', ['Active', 'Inactive' , 'Disable'])->default('Inactive');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->text('roles_name')->default('User');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
