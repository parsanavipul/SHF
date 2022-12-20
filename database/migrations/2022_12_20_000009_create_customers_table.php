<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->longText('address')->nullable();
            $table->string('mobile_no');
            $table->string('email_address')->nullable();
            $table->date('dob')->nullable();
            $table->string('pan_card_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
