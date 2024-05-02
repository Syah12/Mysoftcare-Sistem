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
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('ic')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('letter')->nullable();
            $table->date('year')->nullable();
            $table->string('educational_level')->nullable();
            $table->string('institutions')->nullable();
            $table->json('skills')->nullable();
            $table->string('university')->nullable();
            $table->integer('training_period')->nullable();
            $table->date('start_intern')->nullable();
            $table->date('end_intern')->nullable();
            $table->string('image')->nullable();
            $table->string('resume')->nullable();
            $table->string('status')->nullable();
            $table->string('office_position')->nullable();
            $table->string('colour')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
};
