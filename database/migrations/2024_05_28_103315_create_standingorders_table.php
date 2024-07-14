<?php

use App\Models\User;
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
        Schema::create('standingorders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['income','expense']);
            $table->date('starting_date');
            $table->date('end_date')->nullable();
            $table->enum('interval', ['daily', 'weekly', 'monthly', 'quarterly', 'yearly']);
            $table->string('description')->nullable();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standingorders');
    }
};
