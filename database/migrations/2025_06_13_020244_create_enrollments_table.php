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
        Schema::create('enrollments', function (Blueprint $table) {                  
            $table->foreignId('user_id')->constrained()->onDelete('cascade');        // 4th Update
            $table->foreignId('course_id')->constrained()->onDelete('cascade');      // 4th Update
            $table->string('status')->default('enrolled');                           // 4th Update
            $table->string('grade')->nullable();                                     // 4th Update

            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
