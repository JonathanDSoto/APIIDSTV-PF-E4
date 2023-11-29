<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('id_clients')->constrained('clients');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assistances');
    }
};