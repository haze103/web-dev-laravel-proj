<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('company');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('assigned_to')->constrained('users')->nullable();
            $table->enum('stage', ['new', 'contacted', 'proposal sent', 'won', 'lost'])->constrained('users');
            $table->date('closing_date');
            $table->decimal('amount', 18, 2);
            $table->enum('status', ['active', 'follow-up', 'cold']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
