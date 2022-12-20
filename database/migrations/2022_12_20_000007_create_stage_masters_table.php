<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageMastersTable extends Migration
{
    public function up()
    {
        Schema::create('stage_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stage');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
