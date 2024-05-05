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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->nullable();
            $table->string('name')->nullable();
            $table->string('agency')->nullable();
            $table->string('pic_agency')->nullable();
            $table->integer('contract_period')->nullable();
            $table->integer('contract_guarentee')->nullable();
            $table->date('start_date_contract')->nullable();
            $table->date('end_date_contract')->nullable();
            $table->integer('contract_value')->nullable();
            $table->string('sst')->nullable();
            $table->longText('notes')->nullable();
            $table->string('creator')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
