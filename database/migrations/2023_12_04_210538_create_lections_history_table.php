<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lection_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lection_id')->constrained('lections');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('instructor_id')->constrained('instructors');
            $table->boolean('completed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lection_history');
    }
};