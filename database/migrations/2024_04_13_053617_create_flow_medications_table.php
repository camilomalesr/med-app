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
        Schema::create('flow_medications', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('amount');
            $table->enum('type', ['Add', 'Less'])->default('Add');
            $table->unsignedBigInteger('medications_patients_id'); 
            $table->foreign('medications_patients_id')->references('id')->on('medications_patients');
            $table->enum('status', ['A', 'I'])->default('A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flow_medications');
    }
};
