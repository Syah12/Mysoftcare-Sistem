<?php

use App\Models\Agency;
use App\Models\Position;
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
        Schema::create('p_i_c_s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agency::class, 'agency_id')
                ->nullable()
                ->constrained(Agency::getModel()->getTable())
                ->onDelete('cascade');
            $table->foreignIdFor(Position::class, 'position_id')
                ->nullable()
                ->constrained(Position::getModel()->getTable())
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_i_c_s');
    }
};
