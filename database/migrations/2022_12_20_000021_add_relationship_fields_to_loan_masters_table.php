<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLoanMastersTable extends Migration
{
    public function up()
    {
        Schema::table('loan_masters', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'bank_fk_7771496')->references('id')->on('bank_masters');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_7771497')->references('id')->on('product_masters');
            $table->unsignedBigInteger('subproduct_id')->nullable();
            $table->foreign('subproduct_id', 'subproduct_fk_7771498')->references('id')->on('product_masters');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_7771499')->references('id')->on('customers');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->foreign('stage_id', 'stage_fk_7771606')->references('id')->on('stage_masters');
            $table->unsignedBigInteger('dme_1_id')->nullable();
            $table->foreign('dme_1_id', 'dme_1_fk_7771505')->references('id')->on('users');
            $table->unsignedBigInteger('dme_2_id')->nullable();
            $table->foreign('dme_2_id', 'dme_2_fk_7771506')->references('id')->on('users');
            $table->unsignedBigInteger('dme_3_id')->nullable();
            $table->foreign('dme_3_id', 'dme_3_fk_7771507')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7772091')->references('id')->on('teams');
        });
    }
}
