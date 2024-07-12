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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('state_name');
            $table->timestamps();
        });

        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('state_id');
            $table->integer('term')->unsigned()->nullable(false)->default(0);
            $table->integer('amount')->unsigned()->nullable(false)->default(0);
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('state_id')->references('id')->on('states');
        });
         
        Schema::create('scheduled_repayments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('state_id');
            $table->date('repayment_date');
            $table->integer('amount')->unsigned()->nullable(false)->default(0);
            $table->timestamps();
        
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->foreign('state_id')->references('id')->on('states');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config');
    }
};
