<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lection_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lection_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('instructor_id')->constrained();
            $table->boolean('completed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lections_history');
    }
};