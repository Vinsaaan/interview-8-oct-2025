<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();                                // id
            $table->string('name')->unique();           // unique, min:5 validated in controller
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();                       // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
