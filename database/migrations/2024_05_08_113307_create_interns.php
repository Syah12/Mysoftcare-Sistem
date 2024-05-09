<?php

use App\Models\University;
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
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')
                ->nullable()
                ->constrained(User::getModel()->getTable())
                ->onDelete('cascade');

            $table->foreignIdFor(University::class, 'university_id')
                ->nullable()
                ->constrained(University::getModel()->getTable())
                ->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('ic')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->json('letter')->nullable();
            $table->json('educational_level')->nullable();
            $table->json('skills')->nullable();
            $table->integer('training_period')->nullable();
            $table->date('start_intern')->nullable();
            $table->date('end_intern')->nullable();
            $table->string('image')->nullable();
            $table->string('resume')->nullable();
            $table->string('status')->nullable();
            $table->string('office_position')->nullable();
            $table->string('colour')->nullable();
            $table->softDeletes();
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
