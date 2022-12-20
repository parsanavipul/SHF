<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankMastersTable extends Migration
{
    public function up()
    {
        Schema::create('bank_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bankname')->unique();
            $table->date('billing_start_at');
            $table->date('billing_end_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
