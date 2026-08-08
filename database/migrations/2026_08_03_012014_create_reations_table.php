<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Reation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reations', function (Blueprint $table) {
            $table->id();
            $table->enum('value', [Reation::LIKE, Reation::DISLIKE]);
            $table->unsignedBigInteger('reationable_id');
            $table->string('reationable_type');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reations');
    }
};
