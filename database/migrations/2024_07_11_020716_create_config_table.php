<?php
use App\Enums\LoanState;
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
            $table->enum('state', LoanState::getValues())->default(LoanState::PENDING);
            $table->integer('term')->unsigned()->nullable(false)->default(0);
            $table->integer('amount')->unsigned()->nullable(false)->default(0);
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users');
        });
         
        Schema::create('repayments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id');
            $table->date('repayment_date')->nullable();
            $table->enum('state', LoanState::getValues())->default(LoanState::PENDING);
            $table->integer('amount')->unsigned()->nullable(false)->default(0);
            $table->timestamps();
        
            $table->foreign('loan_id')->references('id')->on('loans');
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
