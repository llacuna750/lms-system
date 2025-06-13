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
        Schema::create('courses', function (Blueprint $table) {
            $table->string('title');                                                      // 3rd Update
            $table->text('description');                                                  // 3rd Update
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');          // 3rd Update
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');   // 3rd Update

            $table->string('name'); // <- This must exist   

            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
