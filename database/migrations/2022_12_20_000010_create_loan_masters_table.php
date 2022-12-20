<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanMastersTable extends Migration
{
    public function up()
    {
        Schema::create('loan_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_no')->nullable();
            $table->string('loan_account_no')->nullable();
            $table->decimal('amount', 15, 2);
            $table->float('loan_tenure', 5, 2)->nullable();
            $table->string('is_self_connector');
            $table->date('sanctioned_date')->nullable();
            $table->decimal('sanctioned_amount', 15, 2)->nullable();
            $table->date('disbursement_date')->nullable();
            $table->decimal('disbursement_amount', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
