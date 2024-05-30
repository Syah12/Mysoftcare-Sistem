<?php

use App\Models\Agency;
use App\Models\PIC;
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
            $table->foreignIdFor(Agency::class, 'agency_id')
                ->nullable()
                ->constrained(Agency::getModel()->getTable())
                ->onDelete('cascade');
            $table->json('pic_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('name')->nullable();
            $table->integer('contract_guarentee')->nullable();
            $table->date('start_date_contract')->nullable();
            $table->date('end_date_contract')->nullable();
            $table->integer('contract_value')->nullable();
            $table->string('sst')->nullable();
            $table->longText('notes')->nullable();
            $table->string('creator')->nullable();
            $table->string('status')->nullable();
            $table->string('mileage')->nullable();
            $table->date('date')->nullable();
            $table->string('place')->nullable();
            $table->string('status_mileage')->nullable();
            $table->softDeletes();
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
